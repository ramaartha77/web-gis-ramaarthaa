<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Include Laravel Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    @section('title')

        <!-- Leaflet.js CDN -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

        <!-- Google Maps API -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4lKVb0eLSNyhEO-C_8JoHhAvba6aZc3U"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    </head>

    <body>
        <section class="bg-gray-100 min-h-screen flex items-center justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                <div id="leaflet-map" class="h-96 rounded-lg shadow-lg"></div>
                <div id="google-map" class="h-96 rounded-lg shadow-lg"></div>
            </div>
            <div class="container max-w-4xl mx-auto px-4 py-8 space-y-8">
                <!-- Marker Form -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3 border-gray-200 flex items-center">
                        <i class="fas fa-map-pin mr-3 text-red-600"></i>
                        Add Marker
                    </h2>
                    <form id="markerForm" class="space-y-6">
                        <div>
                            <label for="markerName" class="block text-sm font-medium text-gray-700">
                                Location Name
                            </label>
                            <input type="text" id="markerName" placeholder="Enter location name" required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-700">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="markerLat" class="block text-sm font-medium text-gray-700">
                                    Latitude
                                </label>
                                <input type="text" id="markerLat" placeholder="Latitude" required
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-700">
                            </div>
                            <div>
                                <label for="markerLng" class="block text-sm font-medium text-gray-700">
                                    Longitude
                                </label>
                                <input type="text" id="markerLng" placeholder="Longitude" required
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-700">
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full bg-blue-600 text-white py-3 rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition flex items-center justify-center">
                            <i class="fas fa-plus mr-2"></i> Add Marker
                        </button>
                    </form>
                </div>

                <!-- Polygon Form -->
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-3 border-gray-200 flex items-center">
                        <i class="fas fa-draw-polygon mr-3 text-purple-500"></i>
                        Add Polygon
                    </h2>
                    <form id="polygonForm" class="space-y-6">
                        <div>
                            <label for="polygonCoords" class="block text-sm font-medium text-gray-700">
                                Polygon Coordinates (JSON)
                            </label>
                            <textarea id="polygonCoords" placeholder='[{"lat": -6.2, "lng": 106.8}, ...]' required
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-gray-700 h-36"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-purple-600 text-white py-3 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition flex items-center justify-center">
                            <i class="fas fa-plus mr-2"></i> Add Polygon
                        </button>
                    </form>
                </div>

            </div>

            <script src="{{ asset('js/script-latihan2.js') }}"></script>
        </section>
    </body>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-7">
        <div class="container mx-auto text-center">
            <div class="flex justify-center space-x-4 mb-4">
                <a href="https://www.linkedin.com/in/ramaarthaa/" class="text-white hover:text-blue-300"><i
                        class="fab fa-linkedin text-2xl"></i></a>
                <a href="https://github.com/ramaartha77" class="text-white hover:text-blue-300"><i
                        class="fab fa-github text-2xl"></i></a>
                <a href="https://www.instagram.com/ramaarthaa/" class="text-white hover:text-blue-300"><i
                        class="fab fa-instagram text-2xl"></i></a>
            </div>
            <p class="mb-2">© 2024 Kadek Rama Artha Mahesa. All Rights Reserved.</p>
        </div>
    </footer>

    </html>
