<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactRequestsController;
use App\Http\Controllers\EducationLevelsController;
use App\Http\Controllers\SkillsController;

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

Route::get('/skills', [SkillsController::class, 'getAll']);

Route::get('/educationlevels', [EducationLevelsController::class, 'getAll']);

Route::get('/contactrequests', [ContactRequestsController::class, 'getAll']);
Route::post('/contactrequests', [ContactRequestsController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
