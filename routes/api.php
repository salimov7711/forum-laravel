<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\TopicController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
	return $request->user();
});

Route::get('/', [GroupController::class, 'index']);
Route::post('/topic', [TopicController::class, 'store']);
Route::get('/{group}', [GroupController::class, 'show']);

Route::get('/group/{category}', [CategoryController::class, 'show']);
Route::get('/topic/{topic}', [TopicController::class, 'show']);
