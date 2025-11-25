<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Models\Image;

Route::get('/images', function () {
    return Image::all()->map(function ($img) {
        return asset('storage/' . $img->image);  // Return full URL
    });
});


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
