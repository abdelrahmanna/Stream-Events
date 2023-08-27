<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DonationController extends Controller
{
    /**
     * Get donation revenue since n days ago.
     *
     * @return \Illuminate\Http\Response
     */
    public function revenue(Request $request)
    {
        $days = $request->get("days", 30);

        // get all unique currencies in the donations table
        $currencies = Donation::distinct("upper(currency)")->pluck("currency");

        // call exchange rate api to get the latest exchange rate to euro 
        // (since i am on the free tier, i can only get exchange rate to euro)
        $exchangeRatesToEuro = $this->getExchangeRate($currencies);

        $donationRevenue = Donation::where(
            "created_at",
            ">=",
            now()->subDays($days)->startOfDay()
        )->select("amount", "currency")->get()->map(function ($donation) use ($exchangeRatesToEuro) {
            // convert all currencies to usd
            $usdExchangeModifier = $exchangeRatesToEuro[strtoupper($donation->currency)] / $exchangeRatesToEuro["USD"];
            $donation->amount = $donation->amount * $usdExchangeModifier;
            return $donation;
        })->sum("amount");

        return response()->json($donationRevenue);
    }

    /**
     * Get the exchange rate of a currencies.
     * 
     * @return Array
     */
    private function getExchangeRate($currencies)
    {
        $exchangeRates = [];

        // call third party exchange rate api
        $response = Http::get(
            env("EXCHANGE_RATE_API_URL"),
            [
                "access_key" => env("EXCHANGE_RATE_API_KEY"),
                "symbols" => $currencies->join(",")
            ],

        );

        $exchangeRates = $response->json()["rates"];
        return $exchangeRates;
    }
}
