<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionType;

class SubscriptionTypeViewController extends Controller
{
    public function index()
    {
        $subscriptions = SubscriptionType::all();
        return view('subscriptions.index', compact('subscriptions'));
    }
}
