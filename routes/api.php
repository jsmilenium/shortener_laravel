<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortenerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/shortener', [App\Http\Controllers\ShortenerController::class, 'shortener']);
Route::get('/redirect/{id}', [App\Http\Controllers\ShortenerController::class, 'redirect']);
Route::get('/topurls', [App\Http\Controllers\ShortenerController::class, 'topUrls']);
