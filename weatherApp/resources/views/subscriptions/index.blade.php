@extends('layouts.app')

@section('content')
    // rework this to show actual customer subscriptions :)
    <div class="row" id="subscriptionTypeContainer">
        @foreach($subscriptions as $subscription)
            <div class="col-md-4 mb-4 subscription-card" subscription="{{$subscription->name}}">
                <div class="card text-center">
                    <div class="card-header">
                        <h5>
                            Type: {{ $subscription->name }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <p>{{ $subscription->description }}</p>

                        <p><strong>Nr of stations:</strong> <span class="subscription-stations">{{ $subscription->nr_stations }}</span></p>

                        <p><strong>Price/station:</strong> $<span class="price-station">{{ $subscription->price_per_station }}</span></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
