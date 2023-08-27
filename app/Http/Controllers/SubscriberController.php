<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Get subscriber revenue since n days ago.
     *
     * @return \Illuminate\Http\Response
     */
    public function revenue(Request $request)
    {
        // get number of days
        $numberOfDays = $request->input("days", "30");

        // get subscriber revenue since n days ago
        $subscriberRevenue = Subscriber::join(
            "superscription_tiers",
            "superscription_tiers.id",
            "subscribers.superscription_tier_id"
        )
            ->where(
                "subscribers.created_at",
                ">=",
                now()->subDays($numberOfDays)->startOfDay()
            )
            ->sum("price");

        // return response
        return response()->json($subscriberRevenue);
    }
}
