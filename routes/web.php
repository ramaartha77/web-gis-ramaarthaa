<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapDataController;
use App\Http\Controllers\PetaCRUDController;



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





Route::get('/handson3', [PetaCRUDController::class, 'index'])->name('handson3.index');

// API routes
Route::prefix('api')->group(function () {
    Route::get('/markers', [MapDataController::class, 'getMarkers']);
    Route::get('/polygons', [MapDataController::class, 'getPolygons']);
    Route::post('/markers', [MapDataController::class, 'storeMarker']);
    Route::post('/polygons', [MapDataController::class, 'storePolygon']);
    Route::delete('/markers/{id}', [MapDataController::class, 'deleteMarker']);
    Route::delete('/polygons/{id}', [MapDataController::class, 'deletePolygon']);
});



Route::get('/interactiveUp', [MapDataController::class, 'index'])->name('map.index');
Route::post('/markers', [MapDataController::class, 'storeMarker'])->name('map.storeMarker');
Route::post('/polygons', [MapDataController::class, 'storePolygon'])->name('map.storePolygon');
Route::get('/data', [MapDataController::class, 'getData'])->name('map.getData');

/*HANDS-ON 3 : */
Route::get('/handson3', [PetaCRUDController::class, 'index'])->name('handson3.index');
Route::get('/listDataMarker', [PetaCRUDController::class, 'getListMarker'])->name('handson3.getListMarker');
Route::get('/listDataPolygon', [PetaCRUDController::class, 'getListPolygon'])->name('handson3.getListPolygon');
Route::post('/storeMarker', [PetaCRUDController::class, 'index'])->name('handson3.storeMarker');
Route::post('/storePolygon', [PetaCRUDController::class, 'index'])->name('handson3.storePolygon');

/*HANDS-ON 4 : */
Route::get('/handson4/viewmaps/{id}', [PetaCRUDController::class, 'viewmaps'])->name('handson4.viewmaps');
Route::get('/handson4/viewleaflet/{id}', [PetaCRUDController::class, 'viewleaflet'])->name('handson4.viewleaflet');
Route::get('/handson4/{id}/edit', [PetaCRUDController::class, 'edit'])->name('handson4.edit');
Route::put('/updateMarker', [PetaCRUDController::class, 'updateMarker'])->name('handson4.updateMarker');
