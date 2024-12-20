<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapDataController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Web routes
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/map-latihan1', function () {
    return view('map-latihan1');
})->name('map-latihan1');

Route::get('/map-tugas1', function () {
    return view('map-tugas1');
})->name('map-tugas1');

Route::get('/map-tugas2', function () {
    return view('map-tugas2');
})->name('map-tugas2');

Route::get('/map-interactive', function () {
    return view('map-interactive');
})->name('map-interactive');

// API routes
Route::prefix('api')->group(function () {
    Route::get('/markers', [MapDataController::class, 'getMarkers']);
    Route::get('/polygons', [MapDataController::class, 'getPolygons']);
    Route::post('/markers', [MapDataController::class, 'storeMarker']);
    Route::post('/polygons', [MapDataController::class, 'storePolygon']);
    Route::delete('/markers/{id}', [MapDataController::class, 'deleteMarker']);
    Route::delete('/polygons/{id}', [MapDataController::class, 'deletePolygon']);
});
