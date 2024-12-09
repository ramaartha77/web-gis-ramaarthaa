// Koordinat Rektorat Universitas Udayana
const unudLocation = {
    lat: -8.7984047,
    lng: 115.1698715
};

// Koordinat Denpasar
const denpasarLocation = {
    lat: -8.672844774576658,
    lng: 115.21903883049683
};

// Inisialisasi Google Maps
window.initMap = function() {
    // Variabel untuk menyimpan zoom level dan pusat awal
    const initialCenter = unudLocation;
    const initialZoom = 15;

    // Buat peta Google
    const googleMap = new google.maps.Map(document.getElementById('google-map'), {
        center: initialCenter,
        zoom: initialZoom
    });

    // Tambahkan marker di lokasi Rektorat
    const rektoratMarker = new google.maps.Marker({
        position: unudLocation,
        map: googleMap,
        title: 'Rektorat Universitas Udayana'
    });

    // InfoWindow untuk Rektorat
    const rektoratInfoWindow = new google.maps.InfoWindow({
        content: '<strong>Kantor : Rektorat Universitas Udayana</strong>'
    });

    // InfoWindow untuk Denpasar
    const denpasarInfoWindow = new google.maps.InfoWindow({
        content: '<strong>Kota Denpasar</strong>'
    });

    // Event listener untuk Rektorat marker
    rektoratMarker.addListener('click', () => {
        googleMap.setCenter(unudLocation);
        googleMap.setZoom(15);
        rektoratInfoWindow.open(googleMap, rektoratMarker);
    });

    // Event listener untuk Denpasar marker
    denpasarMarker.addListener('click', () => {
        googleMap.setCenter(denpasarLocation);
        googleMap.setZoom(15);
        denpasarInfoWindow.open(googleMap, denpasarMarker);
    });

    // Event listener untuk zoom out saat info window ditutup
    rektoratInfoWindow.addListener('closeclick', () => {
        googleMap.setCenter(initialCenter);
        googleMap.setZoom(initialZoom);
    });

    denpasarInfoWindow.addListener('closeclick', () => {
        googleMap.setCenter(initialCenter);
        googleMap.setZoom(initialZoom);
    });
}

// Inisialisasi Leaflet Map
document.addEventListener('DOMContentLoaded', function() {
    // Variabel untuk menyimpan zoom level awal
    const initialZoom = 10;

    // Buat peta Leaflet
    const leafletMap = L.map('leaflet-map').setView([unudLocation.lat, unudLocation.lng], initialZoom);

    // Tambahkan tile layer OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(leafletMap);

    // Tambahkan marker di lokasi Rektorat Universitas Udayana
    const rektoratMarker = L.marker([unudLocation.lat, unudLocation.lng]).addTo(leafletMap);
    const rektoratPopup = rektoratMarker.bindPopup('<strong>Kantor : Rektorat Universitas Udayana</strong>');

    // Tambahkan marker di lokasi Denpasar
    const denpasarMarker = L.marker([denpasarLocation.lat, denpasarLocation.lng]).addTo(leafletMap);
    const denpasarPopup = denpasarMarker.bindPopup('<strong>Kantor : Rektorat Universitas Udayana</strong>');

    // Event listener untuk zoom saat Rektorat marker diklik
    rektoratMarker.on('click', () => {
        leafletMap.setView([unudLocation.lat, unudLocation.lng], 15);
    });

    // Event listener untuk zoom saat Denpasar marker diklik
    denpasarMarker.on('click', () => {
        leafletMap.setView([denpasarLocation.lat, denpasarLocation.lng], 15);
    });

    // Event listener untuk zoom out saat popup ditutup
    rektoratPopup.on('popupclose', () => {
        leafletMap.setView([unudLocation.lat, unudLocation.lng], initialZoom);
    });

    denpasarPopup.on('popupclose', () => {
        leafletMap.setView([unudLocation.lat, unudLocation.lng], initialZoom);
    });

    // Task Popup Logic
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
