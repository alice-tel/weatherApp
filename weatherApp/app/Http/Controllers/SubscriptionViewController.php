<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Subscription;

class SubscriptionViewController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with(['Company', 'subscriptionType'])->get();
        return view('subscriptions.index', compact('subscriptions'));
    }

    public function contract($contractId)
    {
        $contract = Subscription::where('id', $contractId)
            ->with(['Company.country', 'subscriptionType', 'stations'])
            ->firstOrFail();

        return view('subscriptions.contract', compact('contract'));
    }
}
