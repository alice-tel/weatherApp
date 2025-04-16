@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-left">
                <h1>{{ $contract->identifier }}</h1>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Company Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>{{$contract->Company->name}}</strong></p>
                            <p>{{$contract->Company->city}}, {{$contract->Company->Country->country}}</p>
                            <p>{{$contract->Company->street}} {{$contract->Company->number}}
                                @if($contract->Company->number_additional !== null)
                                    {{$contract->Company->number_additional}}
                                @endif
                            </p>
                            <p>{{$contract->Company->zip_code}}</p>
                            <p>{{$contract->Company->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h5>Subscription Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>{{$contract->subscriptionType->name}} subscription</strong></p>
                            <p><strong>Stations: </strong>
                                @foreach($contract->stations as $station)
                                    {{$station->name}}
                                @endforeach
                            </p>
                            <p><strong>Started:</strong> {{$contract->start_date}}
                            @if($contract->end_date !== null)
                                <strong>Ended:</strong> {{$contract->end_date}}
                            @endif
                            </p>
                            <p><strong>Price:</strong> ${{$contract->price}}</p>
                            @if($contract->notes !== null)
                                <p><strong>Additional subscription details:</strong> {{$contract->notes}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
