<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- Leaflet Draw Plugin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/script-tugas2.js') }}"></script>

    <title>Latihan 2 - Peta Interaktif</title>

    <style>
        #map {
            height: 500px;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Peta Interaktif</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-map"></i>
                                <p>Peta</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Map Section -->
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Peta Interaktif</h3>
                                </div>
                                <div class="card-body">
                                    <div id="map" class="h-96"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Section -->
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tambahkan Data</h3>
                                </div>
                                <div class="card-body">
                                    <h5>Tambahkan Marker</h5>
                                    <form id="markerForm">
                                        <div class="form-group">
                                            <input type="text" id="markerName" class="form-control"
                                                placeholder="Nama Lokasi" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="markerLat" class="form-control"
                                                placeholder="Latitude" required />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="markerLng" class="form-control"
                                                placeholder="Longitude" required />
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tambah Marker</button>
                                    </form>

                                    <h5 class="mt-4">Tambahkan Poligon</h5>
                                    <form id="polygonForm">
                                        <div class="form-group">
                                            <textarea id="polygonCoords" class="form-control" placeholder='Koordinat Poligon (JSON)' rows="4" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Tambah Poligon</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Daftar Marker</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped" id="markerTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Latitude</th>
                                                <th>Longitude</th>
                                                <th style="width: 120px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Daftar Poligon</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped" id="polygonTable">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Koordinat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</body>

</html>
