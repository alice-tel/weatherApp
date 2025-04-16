<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionApiController extends Controller
{
    /**
     * Display a listing of all subscriptions.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $subscriptions = Subscription::with(['Company', 'subscriptionType'])->get();

        return response()->json([
            'success' => true,
            'data' => $subscriptions
        ]);
    }

    /**
     * Display the specified subscription.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $subscription = Subscription::where('id', $id)
            ->with(['Company.Country', 'subscriptionType', 'stations'])
            ->firstOrFail();

        return response()->json([
            'success' => true,
            'data' => $subscription
        ]);
    }
}
