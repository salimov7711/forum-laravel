<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GroupController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TopicController;
use App\Models\Post;
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
Route::post('/post', [PostController::class, 'store']);
Route::get('/{group}', [GroupController::class, 'show']);

Route::get('/group/{category}', [CategoryController::class, 'show']);
Route::get('/topic/{topic}', [TopicController::class, 'show']);
Route::post('/post/like', [PostController::class,'addLike']);
