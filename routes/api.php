<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanetController;

Route::get('/user', function (Request $request) {
        return $request->user();
})->middleware('auth:sanctum');

Route::get('/planets', [PlanetController::class, 'fetch']);