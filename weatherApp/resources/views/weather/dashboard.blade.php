@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Weather Dashboard</h1>
                <button id="refreshButton" class="btn btn-primary">
                    <span id="refreshIcon" class="me-2">🔄</span> Refresh
                </button>
            </div>
            <p>Latest measurements from all stations - Updates every 60 seconds</p>
        </div>
    </div>

    <div class="row" id="stationsContainer">
        @foreach($latestMeasurements as $measurement)
            <div class="col-md-4 mb-4 station-card" data-station="{{ $measurement->station }}">
                <div class="card">
                    <div class="card-header">
                        <h5>
                            Station: {{ $measurement->station }}
                            @if($measurement->originalMeasurement)
                                <span class="badge bg-warning">Has Issues</span>
                            @endif
                        </h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Date/Time:</strong> <span class="station-datetime">{{ $measurement->date }} {{ $measurement->time }}</span></p>

                        @if($measurement->temperature !== null)
                            <p><strong>Temperature:</strong> <span class="station-temperature">{{ $measurement->temperature }}</span>°C</p>
                        @else
                            <p><strong>Temperature:</strong> <span class="text-danger">Not available</span></p>
                        @endif

                        @if($measurement->wind_speed !== null)
                            <p><strong>Wind:</strong> <span class="station-wind">{{ $measurement->wind_speed }}</span> m/s
                                @if($measurement->wind_direction !== null)
                                    (<span class="station-wind-direction">{{ $measurement->wind_direction }}</span>°)
                                @endif
                            </p>
                        @endif

                        @if($measurement->cloud_cover !== null)
                            <p><strong>Cloud Cover:</strong> <span class="station-clouds">{{ $measurement->cloud_cover }}</span>%</p>
                        @endif

                        @if($measurement->precipitation !== null)
                            <p><strong>Precipitation:</strong> <span class="station-precipitation">{{ $measurement->precipitation }}</span> mm</p>
                        @endif

                        @if($measurement->conditions !== null)
                            <p><strong>Conditions:</strong> <span class="station-conditions">{{ $formatConditions($measurement->conditions) }}</span></p>
                        @endif

                        <div class="station-issues">
                            @if($measurement->originalMeasurement)
                                <div class="alert alert-warning mt-3">
                                    @if($measurement->originalMeasurement->missing_field)
                                        <p class="mb-0"><strong>Missing data:</strong> {{ $measurement->originalMeasurement->missing_field }}</p>
                                    @endif
                                    @if($measurement->originalMeasurement->invalid_temperature !== null)
                                        <p class="mb-0"><strong>Invalid temperature detected:</strong> {{ $measurement->originalMeasurement->invalid_temperature }}°C</p>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('weather.station', $measurement->station) }}" class="btn btn-sm btn-primary">View Details</a>
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

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const refreshButton = document.getElementById('refreshButton');
            const refreshIcon = document.getElementById('refreshIcon');
            const stationsContainer = document.getElementById('stationsContainer');
            const stationTemplate = document.getElementById('stationTemplate');

            // Function to fetch latest data
            async function fetchLatestData() {
                try {
                    refreshIcon.textContent = '⏳';
                    const response = await fetch('/api/dashboard/latest');
                    const data = await response.json();
                    updateDashboard(data);
                    refreshIcon.textContent = '✅';
                    setTimeout(() => {
                        refreshIcon.textContent = '🔄';
                    }, 1000);
                } catch (error) {
                    console.error('Error fetching data:', error);
                    refreshIcon.textContent = '❌';
                }
            }

            // Function to update the dashboard with new data
            function updateDashboard(data) {
                // Track existing stations
                const existingStations = new Set();

                // Update existing stations and add new ones
                data.forEach(station => {
                    existingStations.add(station.station);

                    // Check if station card already exists
                    let stationCard = document.querySelector(`.station-card[data-station="${station.station}"]`);

                    if (!stationCard) {
                        // Clone template and add new station
                        const newCard = stationTemplate.firstElementChild.cloneNode(true);
                        newCard.dataset.station = station.station;
                        newCard.querySelector('.station-name').textContent = station.station;
                        newCard.querySelector('.station-details-link').href = station.station_url;
                        stationsContainer.appendChild(newCard);
                        stationCard = newCard;
                    }

                    // Update station data
                    stationCard.querySelector('.station-datetime').textContent = `${station.date} ${station.time}`;

                    if (station.temperature !== null) {
                        stationCard.querySelector('.station-temperature').textContent = station.temperature;
                    } else {
                        stationCard.querySelector('.station-temperature').innerHTML = '<span class="text-danger">Not available</span>';
                    }

                    if (station.wind_speed !== null) {
                        stationCard.querySelector('.station-wind').textContent = station.wind_speed;
                    }

                    if (station.wind_direction !== null) {
                        stationCard.querySelector('.station-wind-direction').textContent = station.wind_direction;
                    }

                    if (station.cloud_cover !== null) {
                        stationCard.querySelector('.station-clouds').textContent = station.cloud_cover;
                    }

                    if (station.precipitation !== null) {
                        stationCard.querySelector('.station-precipitation').textContent = station.precipitation;
                    }

                    stationCard.querySelector('.station-conditions').textContent = station.conditions;

                    // Update issues badge
                    const badgeContainer = stationCard.querySelector('.station-badge');
                    badgeContainer.innerHTML = station.has_issues ?
                        '<span class="badge bg-warning">Has Issues</span>' : '';

                    // Update issues details
                    const issuesContainer = stationCard.querySelector('.station-issues');
                    issuesContainer.innerHTML = station.has_issues ?
                        '<div class="alert alert-warning mt-3"><p class="mb-0">Station has issues with data</p></div>' : '';
                });

                // Remove stations that are no longer active
                document.querySelectorAll('.station-card').forEach(card => {
                    if (!existingStations.has(card.dataset.station)) {
                        card.remove();
                    }
                });
            }

            // Refresh when button is clicked
            refreshButton.addEventListener('click', fetchLatestData);

            // Auto-refresh every 60 seconds
            setInterval(fetchLatestData, 60000);
        });
    </script>
@endpush
