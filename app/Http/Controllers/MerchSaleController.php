<?php

namespace App\Http\Controllers;

use App\Models\MerchSale;
use Illuminate\Http\Request;

class MerchSaleController extends Controller
{
    /** 
     * Get top n merch items.
     *
     * @return \Illuminate\Http\Response
     */
    public function top(Request $request)
    {
        // get number of items
        $numberOfItems = $request->input("items", "3");

        // get top n merch items
        $topMerchItems = MerchSale::join("merches", "merches.id", "merch_sales.merch_id")
            ->selectRaw("merches.name, sum(merch_sales.amount) as total")
            ->groupBy("merch_sales.merch_id")
            ->orderByDesc("total")
            ->limit($numberOfItems)
            ->get();

        // return response
        return response()->json($topMerchItems);
    }

    /**
     * Get merch revenue since n days ago.
     *
     * @return \Illuminate\Http\Response
     */
    public function revenue(Request $request)
    {
        // get number of days
        $numberOfDays = $request->input("days", "30");

        // get merch revenue since n days ago
        $merchRevenue = MerchSale::join("merches", "merches.id", "merch_sales.merch_id")
            ->where(
                "merch_sales.created_at",
                ">=",
                now()->subDays($numberOfDays)->startOfDay()
            )
            ->selectRaw("sum(merches.price * merch_sales.amount) as revenue")
            ->first()["revenue"];

        // return response
        return response()->json($merchRevenue);
    }
}
