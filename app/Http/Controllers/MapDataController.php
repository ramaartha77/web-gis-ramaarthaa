<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use App\Models\Polygon;
use Illuminate\Http\Request;


class MapDataController extends Controller
{
    // Get all markers
    public function getMarkers()
    {
        return response()->json(Marker::all());
    }

    // Get all polygons
    public function getPolygons()
    {
        return response()->json(Polygon::all());
    }

    // Store a new marker
    public function storeMarker(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $marker = Marker::create($validated);
        return response()->json($marker, 201);
    }

    // Store a new polygon
    public function storePolygon(Request $request)
    {
        try {
            $validated = $request->validate([
                'coordinates' => 'required|array',
                'coordinates.*.lat' => 'required|numeric',
                'coordinates.*.lng' => 'required|numeric',
            ]);

            $polygon = Polygon::create([
                'coordinates' => json_encode($request->coordinates)
            ]);

            return response()->json($polygon, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    // Delete a marker
    public function deleteMarker($id)
    {
        $marker = Marker::findOrFail($id);
        $marker->delete();
        return response()->json(null, 204);
    }

    // Delete a polygon
    public function deletePolygon($id)
    {
        $polygon = Polygon::findOrFail($id);
        $polygon->delete();
        return response()->json(null, 204);
    }
}
