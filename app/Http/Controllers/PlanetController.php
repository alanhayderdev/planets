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
        $cachedPlanets = Cache::remember('planets', 86400, function () {
            $response = Http::get('https://swapi.dev/api/planets/');
            $planets = $response->json()['results'] ?? [];

            foreach ($planets as $planet) {
                Planet::updateOrCreate(['name' => $planet['name']], ['climate' => $planet['climate']]);
            }

            return Planet::all();
        });

        return response()->json($cachedPlanets);
    }
}
