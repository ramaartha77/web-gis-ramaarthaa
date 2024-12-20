// Add Leaflet Map Initialization
document.addEventListener('DOMContentLoaded', function() {
    // Leaflet Map
    const leafletMap = L.map('leaflet-map').setView([-8.7984047, 115.1698715], 10);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(leafletMap);
});

// Google Maps Initialization Function
function initMap() {
    window.googleMap = new google.maps.Map(document.getElementById('google-map'), {
        center: { lat: -8.7984047, lng: 115.1698715 },
        zoom: 10
    });
}

document.getElementById("markerForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const name = document.getElementById("markerName").value;
    const lat = parseFloat(document.getElementById("markerLat").value);
    const lng = parseFloat(document.getElementById("markerLng").value);

    fetch("/api/markers", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ name, latitude: lat, longitude: lng }),
    })
        .then((res) => res.json())
        .then((data) => {
            alert("Marker ditambahkan!");
            // Optional: Add marker to map
            if (window.googleMap) {
                new google.maps.Marker({
                    position: { lat, lng },
                    map: window.googleMap,
                    title: name
                });
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            alert("Gagal menambahkan marker.");
        });
});

// Existing polygon form submission code
document.getElementById("polygonForm").addEventListener("submit", function (e) {
    e.preventDefault();

    try {
        const coords = JSON.parse(document.getElementById("polygonCoords").value);

        fetch("/api/polygons", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ coordinates: coords }),
        })
            .then((res) => res.json())
            .then((data) => {
                alert("Poligon ditambahkan!");
                // Optional: Add polygon to map
                if (window.googleMap) {
                    new google.maps.Polygon({
                        paths: coords,
                        map: window.googleMap,
                        strokeColor: "#FF0000",
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: "#FF0000",
                        fillOpacity: 0.35
                    });
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("Gagal menambahkan poligon.");
            });
    } catch (error) {
        console.error("Invalid JSON for coordinates:", error);
        alert("Koordinat poligon tidak valid.");
    }
});
