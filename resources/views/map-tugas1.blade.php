<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Include Laravel Vite CSS -->
    @vite('resources/css/app.css')

    <title>Tugas 1 - Dasar Peta Interaktif</title>

    <!-- Leaflet.js CDN -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC4lKVb0eLSNyhEO-C_8JoHhAvba6aZc3U&callback=initMap" async
        defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex items-center">
            <a href="{{ route('index') }}"
                class="text-gray-800 hover:text-blue-600 transition duration-300 flex items-center">
                <i class="fas fa-arrow-left mr-3 text-xl"></i>
                <span class="font-semibold">Kembali ke Halaman Utama</span>
            </a>
        </div>
    </nav>

    <!-- Task Popup -->
    <div id="task-popup" class="fixed inset-0 bg-black bg-opacity-50 z-[9999] flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full p-8 relative">
            <button id="close-task-popup" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Tugas HandsOn 1 - Peta Interaktif</h2>

            <div class="space-y-6">
                <div>
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">1. Google Maps API</h3>
                    <ul class="list-disc pl-6 space-y-2 text-gray-700">
                        <li>Buat peta yang terpusat di Rektorat Universitas Udayana, Bali (latitude: -8.7984047,
                            longitude: 115.1698715)</li>
                        <li>Tambahkan marker di lokasi tersebut dengan InfoWindow berisi deskripsi: "Kantor : Rektorat
                            Universitas Udayana"</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">2. Leaflet.js</h3>
                    <ul class="list-disc pl-6 space-y-2 text-gray-700">
                        <li>Tampilkan peta menggunakan OpenStreetMap dengan lokasi yang sama seperti di Google Maps API
                        </li>
                        <li>Tambahkan marker di lokasi Denpasar dengan popup yang menampilkan teks yang sama</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-blue-600 mb-3">3. Layout Laravel</h3>
                    <ul class="list-disc pl-6 space-y-2 text-gray-700">
                        <li>Integrasikan kedua peta (Google Maps dan Leaflet.js) ke dalam satu halaman web Laravel
                            menggunakan Blade</li>
                        <li>Pastikan kedua peta ditampilkan berdampingan secara responsif</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Maps section -->
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-black font-bold text-center text-3xl mb-8">PETA INTERAKTIF DENGAN LARAVEL</h1>

        <!-- Map Container -->
        <div class="grid md:grid-cols-2 gap-6">
            <!-- Leaflet Map -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <h2 class="bg-blue-500 text-white text-center text-xl font-semibold py-3">Leaflet Map</h2>
                <div id="leaflet-map" class="h-96 w-full"></div>
            </div>

            <!-- Google Map -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <h2 class="bg-blue-500 text-white text-center text-xl font-semibold py-3">Google Maps</h2>
                <div id="google-map" class="h-96 w-full"></div>
            </div>
        </div>
    </section>

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

    <!-- JavaScript -->
    <script src="{{ asset('js/script-tugas1.js') }}"></script>
</body>

</html>
