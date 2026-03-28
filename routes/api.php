<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which is assigned the "api" middleware group.
|
*/

// Public routes
Route::post('/login', [AuthController::class, 'login']);

Route::apiResources([
    'user' => UserController::class,
    'album' => AlbumController::class,
    'comment' => CommentController::class,
    'photo' => PhotoController::class,
    'post' => PostController::class,
    'todo' => TodoController::class,
]);

// Protected routes (requires authentication)
/*
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResources([
        'user' => UserController::class,
        'album' => AlbumController::class,
        'comment' => CommentController::class,
        'photo' => PhotoController::class,
        'post' => PostController::class,
        'todo' => TodoController::class,
    ]);

    // Optional: get authenticated user info
    Route::get('/user-info', function (Request $request) {
        return $request->user();
    });

    // Logout route
    Route::post('/logout', [AuthController::class, 'logout']);
});
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
