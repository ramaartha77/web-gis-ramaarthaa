// tables and map features
let map, markers = new Map(), polygons = new Map();

// MAP
document.addEventListener('DOMContentLoaded', function() {
    map = L.map('map').setView([-8.409518, 115.188919], 10);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
    }).addTo(map);

    // Add draw controls to the map
    const drawControl = new L.Control.Draw({
        draw: {
            marker: true,
            polygon: true,
            polyline: false,
            circle: false,
            rectangle: false,
            circlemarker: false
        },
        edit: false
    });
    map.addControl(drawControl);

    // Handle drawn items
    map.on('draw:created', function(e) {
        const type = e.layerType;
        const layer = e.layer;

        if (type === 'marker') {
            const latlng = layer.getLatLng();
            document.getElementById('markerLat').value = latlng.lat;
            document.getElementById('markerLng').value = latlng.lng;
        } else if (type === 'polygon') {
            const coordinates = layer.getLatLngs()[0].map(latlng => ({
                lat: latlng.lat,
                lng: latlng.lng
            }));
            document.getElementById('polygonCoords').value = JSON.stringify(coordinates);
        }
    });

    // Load initial data
    loadExistingData();

    // Setup event listeners
    setupEventListeners();
});

// Alert
function showAlert(message, type = 'info') {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
    alertDiv.innerHTML = `
        ${message}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    `;

    const container = document.querySelector('.content');
    container.insertBefore(alertDiv, container.firstChild);

    // Auto dismiss after 3 seconds
    setTimeout(() => {
        alertDiv.remove();
    }, 3000);
}

// Add marker to map and table
function addMarkerToMap(markerData) {
    const marker = L.marker([markerData.latitude, markerData.longitude])
        .bindPopup(markerData.name)
        .addTo(map);

    markers.set(markerData.id, {
        layer: marker,
        data: markerData
    });
    marker.on('popupclose', function() {
        map.setView([-8.409518, 115.188919], 10); // Zoom out to initial view
    });

    marker.on('click', function() {
        map.setView([markerData.latitude, markerData.longitude], 15); // Zoom in to the marker
    });

    markers.set(markerData.id, {
        layer: marker,
        data: markerData
    });

    updateMarkerTable();
}

// Add polygon to map and table
function addPolygonToMap(polygonData) {
    let coordinates;
    try {
        // Handle both string and array cases
        coordinates = typeof polygonData.coordinates === 'string'
            ? JSON.parse(polygonData.coordinates)
            : polygonData.coordinates;

        const polygonCoords = coordinates.map(coord => [coord.lat, coord.lng]);

        const polygon = L.polygon(polygonCoords).addTo(map);
        polygons.set(polygonData.id, {
            layer: polygon,
            data: polygonData
        });

        updatePolygonTable();
    } catch (error) {
        console.error('Error parsing polygon coordinates:', error);
        showAlert('Error displaying polygon', 'danger');
    }
}
// Load database
async function loadExistingData() {
    try {
        console.log('Loading existing data...');

        const markersResponse = await fetch('/api/markers');
        const polygonsResponse = await fetch('/api/polygons');

        if (!markersResponse.ok || !polygonsResponse.ok) {
            console.error('Markers response:', markersResponse.status);
            console.error('Polygons response:', polygonsResponse.status);
            throw new Error('Failed to fetch data');
        }

        const markersData = await markersResponse.json();
        const polygonsData = await polygonsResponse.json();

        console.log('Loaded markers:', markersData);
        console.log('Loaded polygons:', polygonsData);

        markersData.forEach(markerData => addMarkerToMap(markerData));
        polygonsData.forEach(polygonData => addPolygonToMap(polygonData));

        updateMarkerTable();
        updatePolygonTable();
    } catch (error) {
        console.error('Error loading data:', error);
        showAlert('Error loading existing data', 'error');
    }
}

// Update marker table

function updateMarkerTable() {
    const tbody = document.querySelector('#markerTable tbody');
    if (!tbody) return;

    tbody.innerHTML = '';
    let counter = 1;

    markers.forEach((marker, id) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${counter}</td>
            <td>${marker.data.name}</td>
            <td>${marker.data.latitude}</td>
            <td>${marker.data.longitude}</td>
            <td>
                <button class="btn btn-primary btn-sm view-marker me-1" data-id="${id}">
                    <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-danger btn-sm delete-marker" data-id="${id}">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        tbody.appendChild(row);
        counter++;
    });
}

// Update polygon table
function updatePolygonTable() {
    const tbody = document.querySelector('#polygonTable tbody');
    if (!tbody) return;

    tbody.innerHTML = '';
    let counter = 1;

    polygons.forEach((polygon, id) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${counter}</td>
            <td>${JSON.stringify(polygon.data.coordinates).substring(0, 30)}...</td>
            <td>
                <button class="btn btn-danger btn-sm delete-polygon" data-id="${id}">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        tbody.appendChild(row);
        counter++;
    });
}

function setupEventListeners() {
    // Marker form
    document.getElementById('markerForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        try {
            const markerData = {
                name: document.getElementById('markerName').value,
                latitude: parseFloat(document.getElementById('markerLat').value),
                longitude: parseFloat(document.getElementById('markerLng').value)
            };

            const response = await fetch('/api/markers', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(markerData)
            });

            if (!response.ok) {
                throw new Error('Failed to store marker');
            }

            const savedMarker = await response.json();
            addMarkerToMap(savedMarker);
            showAlert('Marker added successfully', 'success');
            this.reset();
        } catch (error) {
            console.error('Error storing marker:', error);
            if (error.response) {
                console.error('Response:', await error.response.text());
            }
            showAlert('Error adding marker', 'danger');
        }
    });

    // Polygon form

document.getElementById('polygonForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    try {

        const coordinates = JSON.parse(document.getElementById('polygonCoords').value);

        const response = await fetch('/api/polygons', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },

            body: JSON.stringify({ coordinates: coordinates })
        });

        if (!response.ok) {
            const errorText = await response.text();
            console.error('Server response:', errorText);
            throw new Error('Failed to store polygon');
        }

        const savedPolygon = await response.json();
        addPolygonToMap(savedPolygon);
        showAlert('Polygon added successfully', 'success');
        this.reset();
    } catch (error) {
        console.error('Error storing polygon:', error);
        showAlert('Error adding polygon. Check the console for details.', 'danger');
    }
});

    // Delete marker handler
    document.getElementById('markerTable').addEventListener('click', async function(e) {
        if (e.target.closest('.delete-marker')) {
            const id = e.target.closest('.delete-marker').dataset.id;
            try {
                const response = await fetch(`/api/markers/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                if (!response.ok) {
                    throw new Error('Failed to delete marker');
                }

                const marker = markers.get(parseInt(id));
                if (marker) {
                    map.removeLayer(marker.layer);
                    markers.delete(parseInt(id));
                    updateMarkerTable();
                }
                showAlert('Marker deleted successfully', 'success');
            } catch (error) {
                console.error('Error deleting marker:', error);
                showAlert('Error deleting marker', 'danger');
            }
        }
    });

    // Delete polygon handler
    document.getElementById('polygonTable').addEventListener('click', async function(e) {
        if (e.target.closest('.delete-polygon')) {
            const id = e.target.closest('.delete-polygon').dataset.id;
            try {
                const response = await fetch(`/api/polygons/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                if (!response.ok) {
                    throw new Error('Failed to delete polygon');
                }

                const polygon = polygons.get(parseInt(id));
                if (polygon) {
                    map.removeLayer(polygon.layer);
                    polygons.delete(parseInt(id));
                    updatePolygonTable();
                }
                showAlert('Polygon deleted successfully', 'success');
            } catch (error) {
                console.error('Error deleting polygon:', error);
                showAlert('Error deleting polygon', 'danger');
            }
        }


    });
      // View marker handler
    document.getElementById('markerTable').addEventListener('click', function(e) {
        if (e.target.closest('.view-marker')) {
            const id = e.target.closest('.view-marker').dataset.id;
            const marker = markers.get(parseInt(id));
            if (marker) {
                // Zoom to marker
                map.setView([marker.data.latitude, marker.data.longitude], 16);
                // Open popup
                marker.layer.openPopup();
            }
        }
    });


}
