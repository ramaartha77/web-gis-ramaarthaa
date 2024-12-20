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

Route::get('/api/markers', [MapDataController::class, 'getMarkers']);
Route::get('/api/polygons', [MapDataController::class, 'getPolygons']);
Route::post('/api/markers', [MapDataController::class, 'storeMarker']);
Route::post('/api/polygons', [MapDataController::class, 'storePolygon']);
Route::delete('/api/markers/{id}', [MapDataController::class, 'deleteMarker']);
Route::delete('/api/polygons/{id}', [MapDataController::class, 'deletePolygon']);


Route::get('/interactive', [MapDataController::class, 'index'])->name('map.index');
Route::post('/markers', [MapDataController::class, 'storeMarker'])->name('map.storeMarker');
Route::post('/polygons', [MapDataController::class, 'storePolygon'])->name('map.storePolygon');
Route::get('/data', [MapDataController::class, 'getData'])->name('map.getData');
