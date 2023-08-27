<?php

use App\Http\Controllers\DonationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\MerchSaleController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// group routes that require authentication
Route::middleware("auth:sanctum")->group(function () {
    // create resource routes for events
    Route::resource("events", EventController::class)->middleware("auth:sanctum");

    // create route group for subscribers
    Route::prefix("subscribers")->group(function () {
        // get subscriber revenue since n days ago
        Route::get("revenue", [SubscriberController::class, "revenue"]);
    });

    // create route group for followers
    Route::prefix("followers")->group(function () {
        // create route for getting number of follower since n days ago
        Route::get("count", [FollowerController::class, "count"]);
    });

    // create route group for donations
    Route::prefix("donations")->group(function () {
        // get donation revenue since n days ago
        Route::get("revenue", [DonationController::class, "revenue"]);
    });

    // create route group for merch sales
    Route::prefix("merch-sales")->group(function () {
        // get top n merch itemts
        Route::get("top", [MerchSaleController::class, "top"]);

        // get merch sale revenue since n days ago
        Route::get("revenue", [MerchSaleController::class, "revenue"]);
    });
});
