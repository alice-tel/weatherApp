@extends('layouts.app')

@section('content')
    <div class="row" id="subscriptionTypeContainer">
        @foreach($subscriptions as $subscription)
            <div class="col-md-4 mb-4 subscription-card" subscription="{{$subscription->name}}">
                <div class="card text-center">
                    <div class="card-header">
                        <h5>
                           {{ $subscription->identifier }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Company: </strong>{{ $subscription->Company->name }}</p>
                        <p><strong>Type: </strong>{{ $subscription->subscriptionType->name }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('subscriptions.contract', $subscription->id) }}" class="btn btn-sm btn-info">View Subscription Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
