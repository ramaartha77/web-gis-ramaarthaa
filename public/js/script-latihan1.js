// Array lokasi di Bali
const locations = [
    {
        name: "Rektorat Universitas Udayana",
        lat: -8.7984047,
        lng: 115.1698715,
        description: "Kampus utama Universitas Udayana"
    },
    {
        name: "Pura Uluwatu",
        lat: -8.8267,
        lng: 115.0865,
        description: "Pura terkenal dengan pemandangan sunset yang indah"
    },
    {
        name: "Pantai Kuta",
        lat: -8.7209,
        lng: 115.1686,
        description: "Salah satu pantai paling populer di Bali"
    },
    {
        name: "Candi Tebing Gunung Kawi",
        lat: -8.4195,
        lng: 115.2839,
        description: "Situs arkeologi bersejarah di Gianyar"
    },
    {
        name: "Danau Beratan",
        lat: -8.2726,
        lng: 115.1581,
        description: "Danau indah di kawasan Bedugul"
    }
];

// Leaflet.js Map
const leafletMap = L.map('leaflet-map').setView([-8.7984047, 115.1698715], 10);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; Esri World Imagiery'
}).addTo(leafletMap);

// Variabel untuk menyimpan zoom level awal
const initialZoom = 10;

// Tambahkan marker untuk setiap lokasi di Leaflet
locations.forEach(location => {
    const leafletMarker = L.marker([location.lat, location.lng]).addTo(leafletMap);
    const popup = leafletMarker.bindPopup(`<b>${location.name}</b><br>${location.description}`);

    // Event listener untuk zoom saat marker diklik
    leafletMarker.on('click', () => {
        leafletMap.setView([location.lat, location.lng], 15);
    });

    // Event listener untuk zoom out saat popup ditutup
    popup.on('popupclose', () => {
        leafletMap.setView([-8.7984047, 115.1698715], initialZoom);
    });
});

// Google Maps API Map
window.initMap = function() {
    const googleMapDiv = document.getElementById('google-map');
    const googleMap = new google.maps.Map(googleMapDiv, {
        center: { lat: -8.7984047, lng: 115.1698715 },
        zoom: 10,
    });

    // Variabel untuk menyimpan zoom level dan pusat awal
    const initialCenter = { lat: -8.7984047, lng: 115.1698715 };
    const initialZoom = 10;

    // Tambahkan marker untuk setiap lokasi di Google Maps
    locations.forEach(location => {
        const googleMarker = new google.maps.Marker({
            position: { lat: location.lat, lng: location.lng },
            map: googleMap,
            title: location.name,
        });

        const infoWindow = new google.maps.InfoWindow({
            content: `<b>${location.name}</b><br>${location.description}`,
        });

        // Tambahkan event listener untuk zoom saat marker diklik
        googleMarker.addListener('click', () => {
            googleMap.setCenter({ lat: location.lat, lng: location.lng });
            googleMap.setZoom(15);
            infoWindow.open(googleMap, googleMarker);
        });

        // Event listener untuk zoom out saat info window ditutup
        infoWindow.addListener('closeclick', () => {
            googleMap.setCenter(initialCenter);
            googleMap.setZoom(initialZoom);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const taskPopup = document.getElementById('task-popup');
        const closeTaskPopup = document.getElementById('close-task-popup');

        // Show popup
        taskPopup.classList.remove('hidden');

        // Tutup popup
        closeTaskPopup.addEventListener('click', function() {
            taskPopup.classList.add('hidden');
        });

        // Tutup popup click diluar card
        taskPopup.addEventListener('click', function(event) {
            if (event.target === taskPopup) {
                taskPopup.classList.add('hidden');
            }
        });
    });
}
