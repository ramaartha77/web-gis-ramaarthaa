@extends('layout.app')

@section('title')
    Maps View
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Crud</a></li>
        <li class="breadcrumb-item active" aria-current="page">Maps View</li>
    </ol>
@endsection

@section('content')
    <!-- CSS and External Resources -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.css" />

    <style type="text/css">
        .select2 {
            width: 100% !important;
        }

        #leaflet-map,
        #google-map {
            height: 400px;
            width: 100%;
            margin-bottom: 20px;
        }
    </style>

    <div class="card card-info card-outline" id="main-box">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-star"></i> Maps View
            </h3>
            <div class="card-tools">
                <a href="{{ url('handson3') }}" class="btn btn-danger btn-sm pull-right" data-toggle="tooltip"
                    data-placement="top" title="Kembali ke daftar data">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>
        <div class="card-body">
            <div id="leaflet-map"></div>
            <div id="google-map"></div>
        </div>
    </div>
@endsection

@section('script')
    <!-- JavaScript Dependencies -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine/dist/leaflet-routing-machine.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4lKVb0eLSNyhEO-C_8JoHhAvba6aZc3U&libraries=places">
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            const marker = @json($marker);

            // Check if marker data is valid
            if (!marker || !marker.latitude || !marker.longitude) {
                console.error('Invalid marker data');
                return;
            }

            // Common coordinates
            const startCoords = {
                lat: -8.7961228,
                lng: 115.1735968
            }; // Universitas Udayana
            const endCoords = {
                lat: -8.794123,
                lng: 115.182347
            }; // Tujuan lain

            // Initialize Leaflet Map
            initLeafletMap(marker, startCoords, endCoords);

            // Initialize Google Map
            initGoogleMap(marker, startCoords, endCoords);
        });

        function initLeafletMap(marker, startCoords, endCoords) {
            // Create Leaflet map
            const leafletMap = L.map('leaflet-map').setView([marker.latitude, marker.longitude], 13);

            // Add tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(leafletMap);

            // Add marker
            const leafletMarker = L.marker([marker.latitude, marker.longitude]).addTo(leafletMap);
            leafletMarker.bindPopup(`<b>${marker.name}</b>`).openPopup();

            // Add routing
            const startPoint = L.latLng(startCoords.lat, startCoords.lng);
            const endPoint = L.latLng(endCoords.lat, endCoords.lng);

            L.Routing.control({
                waypoints: [startPoint, endPoint],
                routeWhileDragging: true
            }).addTo(leafletMap);
        }

        function initGoogleMap(marker, startCoords, endCoords) {
            // Create Google Map
            const googleMap = new google.maps.Map(document.getElementById('google-map'), {
                center: {
                    lat: parseFloat(marker.latitude),
                    lng: parseFloat(marker.longitude)
                },
                zoom: 13
            });

            // Add marker
            new google.maps.Marker({
                position: {
                    lat: parseFloat(marker.latitude),
                    lng: parseFloat(marker.longitude)
                },
                map: googleMap,
                title: marker.name
            });

            // Setup directions
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer();
            directionsRenderer.setMap(googleMap);

            // Calculate route
            const request = {
                origin: startCoords,
                destination: endCoords,
                travelMode: google.maps.TravelMode.DRIVING
            };

            directionsService.route(request, (result, status) => {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsRenderer.setDirections(result);
                } else {
                    console.error(`Error fetching directions: ${status}`);
                }
            });
        }

        function goBack() {
            window.history.back();
        }
    </script>
@endsection
