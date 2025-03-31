@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Weather Station: {{ $station->name }}</h1>
                <a href="{{ route('weather.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <h5>Station Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- TODO: lat and long are not properly displaying -->
                            <p><strong>Station Name:</strong> {{ $station->name }}</p>
                            <p><strong>Longitude:</strong> {{ $station->longitude ?? 'N/A' }}</p>
                            <p><strong>Latitude:</strong> {{ $station->latitude ?? 'N/A' }}</p>
                            <p><strong>Elevation:</strong> {{ $station->elevation ?? 'N/A' }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Recent Measurements</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Date/Time</th>
                                <th>Temp (°C)</th>
                                <th>Dew Point (°C)</th>
                                <th>Pressure (hPa)</th>
                                <th>Wind (m/s)</th>
                                <th>Direction (°)</th>
                                <th>Visibility (km)</th>
                                <th>Cloud Cover (%)</th>
                                <th>Precipitation (mm)</th>
                                <th>Snow Depth (cm)</th>
                                <th>Conditions</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($measurements as $measurement)
                                <tr @if($measurement->originalMeasurement) class="table-warning" @endif>
                                    <td>{{ $measurement->date }} {{ $measurement->time }}</td>
                                    <td>{{ $measurement->temperature ?? 'N/A' }}</td>
                                    <td>{{ $measurement->dewpoint_temperature ?? 'N/A' }}</td>
                                    <td>{{ $measurement->air_pressure_sea_level ?? 'N/A' }}</td>
                                    <td>{{ $measurement->wind_speed ?? 'N/A' }}</td>
                                    <td>{{ $measurement->wind_direction ?? 'N/A' }}</td>
                                    <td>{{ $measurement->visibility ?? 'N/A' }}</td>
                                    <td>{{ $measurement->cloud_cover ?? 'N/A' }}</td>
                                    <td>{{ $measurement->precipitation ?? 'N/A' }}</td>
                                    <td>{{ $measurement->snow_depth ?? 'N/A' }}</td>
                                    <td>
                                        {{ $formatConditions($measurement->conditions) }}
                                    </td>
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

                    <div class="d-flex justify-content-center mt-4">
                        {{ $measurements->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Weather Trends</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="temperatureChart" height="300"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="precipitationChart" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Extract data for charts
            const measurements = @json($measurements->items());
            const dates = measurements.map(m => `${m.date} ${m.time}`).reverse();
            const temperatures = measurements.map(m => m.temperature).reverse();
            const precipitation = measurements.map(m => m.precipitation).reverse();

            // Temperature Chart
            new Chart(document.getElementById('temperatureChart'), {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Temperature (°C)',
                        data: temperatures,
                        borderColor: 'rgb(255, 99, 132)',
                        tension: 0.1,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Temperature Trend'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false
                        }
                    }
                }
            });

            // Precipitation Chart
            new Chart(document.getElementById('precipitationChart'), {
                type: 'bar',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Precipitation (mm)',
                        data: precipitation,
                        backgroundColor: 'rgb(54, 162, 235)',
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Precipitation'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endpush
