<!DOCTYPE html>
<html class="scroll-smooth" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geographic Information Systems Portfolio - Kadek Rama Artha Mahesa</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-900 font-sans leading-normal tracking-normal ">
    <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full z-10 top-0">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="text-xl font-bold text-blue-600">GIS Portfolio</div>
            <div class="space-x-4">
                <a href="#home" class="hover:text-blue-600 transition duration-300">Home</a>
                <a href="#projects" class="hover:text-blue-600 transition duration-300">Projects</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header id="home"
        class="w-full h-screen flex items-center justify-center bg-gradient-to-r from-blue-500 to-indigo-600 text-white pt-16">
        <div class="text-center px-4">

            <h1 class="text-4xl md:text-6xl font-bold mb-4">Kadek Rama Artha Mahesa</h1>
            <h2 class="text-2xl md:text-3xl font-medium mb-2">Geographic Information Systems</h2>
            <p class="text-xl md:text-2xl font-light mb-6">2105541131 | Udayana University</p>
            <div class="flex justify-center space-x-4">

                <a href="#projects"
                    class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-full hover:bg-white hover:text-blue-600 transition duration-300">
                    View Projects
                </a>
            </div>
        </div>
    </header>

    <!-- Latihan -->
    <section id="projects" class="py-16 bg-white">
        <a href= "{{ route('map-latihan1') }}">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Latihan</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Project 1 -->
                    <div
                        class="bg-gray-100 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                        <img src="{{ asset('storage/maps.webp') }}" alt="Project 1" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="text-2xl font-semibold mb-3 text-blue-600">Latihan 1</h3>
                            <p class="text-gray-700 mb-4">Tambahkan marker lokasi, ubah tile layer ke CartoDB/Esri, dan
                                aktifkan zoom otomatis saat marker diklik.</p>
                            <div class="flex items-center">
                                <i class="fas fa-map-marked-alt text-blue-500 mr-3 text-2xl"></i>
                                <span class="text-gray-600">Google Maps API, Letflet, Laravel</span>
                            </div>
                        </div>
                    </div>
        </a>

        <!-- Project 2 -->
        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
            <img src="{{ asset('storage/maps.webp') }}" alt="Project 1" class="w-full h-48 object-cover">
            <div class="p-6 text-gray-500">
                <h3 class="text-2xl font-semibold mb-3 ">Coming Soon</h3>
                <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Consectetur repellendus nesciunt commodi nisi, debitis inventore.</p>
                <!--
                <div class="flex items-center">
                    <i class="fas fa-city text-indigo-500 mr-3 text-2xl"></i>
                    <span class="text-gray-600">Google Maps API, Letflet, Laravel</span>
                </div>
                -->
            </div>
        </div>

        <!-- Project 3 -->
        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
            <img src="{{ asset('storage/maps.webp') }}" alt="Project 1" class="w-full h-48 object-cover">
            <div class="p-6 text-gray-500">
                <h3 class="text-2xl font-semibold mb-3">Coming Soon</h3>
                <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut
                    facilis commodi hic libero officiis maxime.</p>
                <!--
                <div class="flex items-center">
                    <i class="fas fa-city text-indigo-500 mr-3 text-2xl"></i>
                    <span class="text-gray-600">Google Maps API, Letflet, Laravel</span>
                </div>
                -->
            </div>
        </div>
        </div>
        </div>
        </a>
    </section>

    <!-- Tugas -->
    <section id="projects" class="py-16 bg-white">
        <a href= "{{ route('map-tugas1') }}">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Tugas</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Project 1 -->
                    <div
                        class="bg-gray-100 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                        <img src="{{ asset('storage/maps.webp') }}" alt="Project 1" class="w-full h-48 object-cover">
                        <div class="p-6 ">
                            <h3 class="text-2xl font-semibold mb-3 text-blue-600">Tugas 1</h3>
                            <p class="text-gray-700 mb-4">Buat peta Google Maps dan Leaflet.js di Laravel, tampilkan
                                marker lokasi, deskripsi, dan tata letak responsif secara berdampingan.</p>
                            <div class="flex items-center">
                                <i class="fas fa-map-marked-alt text-blue-500 mr-3 text-2xl"></i>
                                <span class="text-gray-600">Google Maps API, Letflet, Laravel</span>
                            </div>
                        </div>
                    </div>
        </a>

        <!-- Project 2 -->
        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
            <img src="{{ asset('storage/maps.webp') }}" alt="Project 1" class="w-full h-48 object-cover">
            <div class="p-6 text-gray-500">
                <h3 class="text-2xl font-semibold mb-3 ">Coming Soon</h3>
                <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate
                    doloremque placeat molestias blanditiis quo tempore!</p>
                <!--
                <div class="flex items-center">
                    <i class="fas fa-city text-indigo-500 mr-3 text-2xl"></i>
                    <span class="text-gray-600">Google Maps API, Letflet, Laravel</span>
                </div>
                -->
            </div>
        </div>


        <!-- Project 3 -->
        <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300 ">
            <img src="{{ asset('storage/maps.webp') }}" alt="Project 1" class="w-full h-48 object-cover ">
            <div class="p-6 text-gray-500">
                <h3 class="text-2xl font-semibold mb-3 ">Coming Soon</h3>
                <p class="text-gray-700 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius non facere,
                    obcaecati cumque laboriosam quam!</p>

                <!--
                <div class="flex items-center">
                    <i class="fas fa-city text-indigo-500 mr-3 text-2xl"></i>
                    <span class="text-gray-600">Google Maps API, Letflet, Laravel</span>
                </div>
                -->
            </div>
        </div>
        </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
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
</body>

</html>
