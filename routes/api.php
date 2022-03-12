<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EquipmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;

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

Route::middleware(['auth:sanctum', 'throttle:10'])->group(function() {
    // Read routes
    Route::middleware('read')->group(function() {
        Route::group(['prefix'  =>  'exercises'], function () {
            Route::get('/', [ExerciseController::class, 'index']);
            Route::get('/{id}', [ExerciseController::class, 'show']);
            Route::get('/image/{id}', [ExerciseController::class, 'image']);
        });

        Route::group(['prefix'  =>  'categories'], function () {
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('/{id}', [CategoryController::class, 'show']);
        });

        Route::group(['prefix'  =>  'equipment'], function () {
            Route::get('/', [EquipmentController::class, 'index']);
            Route::get('/{id}', [EquipmentController::class, 'show']);
        });
    });
});
