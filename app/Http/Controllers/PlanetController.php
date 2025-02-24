<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Models\Planet;

class PlanetController extends Controller
{
    public function fetch()
    {
        // 1. Check cache first
        $cachedPlanets = Cache::get('planets');
        if ($cachedPlanets) {
            return response()->json($cachedPlanets);
        }

        // 2. If cache is empty, check database
        $dbPlanets = Planet::all();
        if ($dbPlanets->isNotEmpty()) {
            // Store in cache before returning
            Cache::put('planets', $dbPlanets, 86400);
            return response()->json($dbPlanets);
        }

        // 3. If both cache & database are empty, fetch from API
        $response = Http::get('https://swapi.dev/api/planets/');
        $planets = $response->json()['results'] ?? [];

        if (!empty($planets)) {
            $planetData = []; // To store data before inserting into DB

            foreach ($planets as $planet) {
                $planetData[] = [
                    'name'            => $planet['name'],
                    'rotation_period' => $planet['rotation_period'],
                    'orbital_period'  => $planet['orbital_period'],
                    'climate'         => $planet['climate'],
                    'population'      => $planet['population'],
                    'created_at'      => now(),
                    'updated_at'      => now()
                ];
            }

            // Insert all planets into the database at once (better performance)
            Planet::insert($planetData);

            // Fetch the newly inserted records
            $newPlanets = Planet::all();

            // Store in cache
            Cache::put('planets', $newPlanets, 86400);

            return response()->json($newPlanets);
        }

        // If API also fails
        return response()->json(['message' => 'No data available'], 404);
    }
}
