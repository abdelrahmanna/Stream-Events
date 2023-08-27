<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    //
    /**
     * Get number of follower since n days ago.
     *
     * @return \Illuminate\Http\Response
     */
    public function count(Request $request)
    {
        // get number of days
        $numberOfDays = $request->input("days", "30");

        // get number of follower since n days ago
        $followerCount = Follower::where(
            "created_at",
            ">=",
            now()->subDays($numberOfDays)->startOfDay()
        )
            ->count();
        // return response
        return response()->json($followerCount);
    }
}
