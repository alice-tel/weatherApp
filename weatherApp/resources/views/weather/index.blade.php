@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Latest Weather Measurements</h1>
            <p>Most recent weather data from all stations</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Station</th>
                                <th>Date/Time</th>
                                <th>Temp (°C)</th>
                                <th>Dew Point (°C)</th>
                                <th>Pressure (hPa)</th>
                                <th>Wind (m/s)</th>
                                <th>Direction (°)</th>
                                <th>Visibility (km)</th>
                                <th>Cloud Cover (%)</th>
                                <th>Precipitation (mm)</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($latestMeasurements as $measurement)
                                <tr @if($measurement->originalMeasurement) class="table-warning" @endif>
                                    <td>
                                        <a href="{{ route('weather.station', $measurement->station) }}">
                                            {{ $measurement->station }}
                                        </a>
                                    </td>
                                    <td>{{ $measurement->date }} {{ $measurement->time }}</td>
                                    <td>{{ $measurement->temperature ?? 'N/A' }}</td>
                                    <td>{{ $measurement->dewpoint_temperature ?? 'N/A' }}</td>
                                    <td>{{ $measurement->air_pressure_sea_level ?? 'N/A' }}</td>
                                    <td>{{ $measurement->wind_speed ?? 'N/A' }}</td>
                                    <td>{{ $measurement->wind_direction ?? 'N/A' }}</td>
                                    <td>{{ $measurement->visibility ?? 'N/A' }}</td>
                                    <td>{{ $measurement->cloud_cover ?? 'N/A' }}</td>
                                    <td>{{ $measurement->percipation ?? 'N/A' }}</td>
                                    <td>
                                        @if($measurement->originalMeasurement)
                                            @if($measurement->originalMeasurement->missing_field)
                                                <span class="badge bg-warning">Missing: {{ $measurement->originalMeasurement->missing_field }}</span>
                                            @endif
                                            @if($measurement->originalMeasurement->invalid_temperature !== null)
                                                <span class="badge bg-danger">Invalid Temp</span>
                                            @endif
                                        @else
                                            <span class="badge bg-success">OK</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
