@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Stations met foutive data</h1>
            </div>
        </div>
    </div>

    <div class="row" id="stationsContainer">
        @foreach($stations as $station)
            <div class="col-md-4 mb-4 station-card" data-station="{{ $station }}">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Station: {{ $station->name }}
                        </h5>
                    </div>
                    <div class="card-body">
                        @if($station->latitude !== null)
                            <p><strong>Latitude:</strong> <span class="station-latitude">{{ $station->latitude }}</span></p>
                        @else
                            <p><strong>Latitude:</strong> <span class="text-danger">Not available</span></p>
                        @endif

                        @if($station->longitude !== null)
                            <p><strong>Longitude:</strong> <span class="station-longitude">{{ $station->longitude }}</span></p>
                        @else
                            <p><strong>Longitude:</strong> <span class="text-danger">Not available</span></p>
                        @endif

                        @if($station->elevation !== null)
                            <p><strong>Elevation:</strong> <span class="station-elevation">{{ $station->elevation }}</span></p>
                        @else
                            <p><strong>Elevation:</strong> <span class="text-danger">Not available</span></p>
                        @endif



{{--                        <div class="station-issues">--}}
{{--                            @if($measurement->originalMeasurement)--}}
{{--                                <div class="alert alert-warning mt-3">--}}
{{--                                    @if($measurement->originalMeasurement->missing_field)--}}
{{--                                        <p class="mb-0"><strong>Missing data:</strong> {{ $measurement->originalMeasurement->missing_field }}</p>--}}
{{--                                    @endif--}}
{{--                                    @if($measurement->originalMeasurement->invalid_temperature !== null)--}}
{{--                                        <p class="mb-0"><strong>Invalid temperature detected:</strong> {{ $measurement->originalMeasurement->invalid_temperature }}°C</p>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('weather.station', $station) }}" class="btn btn-sm btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div id="stationTemplate" style="display: none;">
        <div class="col-md-4 mb-4 station-card" data-station="STATION_NAME">
            <div class="card">
                <div class="card-header">
                    <h5>
                        Station: <span class="station-name">STATION_NAME</span>
                        <span class="station-badge"></span>
                    </h5>
                </div>
                <div class="card-body">
                    <p><strong>Date/Time:</strong> <span class="station-datetime">DATE_TIME</span></p>
                    <p><strong>Temperature:</strong> <span class="station-temperature">TEMP</span>°C</p>
                    <p><strong>Wind:</strong> <span class="station-wind">WIND</span> m/s
                        (<span class="station-wind-direction">DIR</span>°)</p>
                    <p><strong>Cloud Cover:</strong> <span class="station-clouds">CLOUDS</span>%</p>
                    <p><strong>Precipitation:</strong> <span class="station-precipitation">PRECIP</span> mm</p>
                    <p><strong>Conditions:</strong> <span class="station-conditions">CONDITIONS</span></p>
                    <div class="station-issues"></div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-sm btn-primary station-details-link">View Details</a>
                </div>
            </div>
        </div>
    </div>
@endsection

