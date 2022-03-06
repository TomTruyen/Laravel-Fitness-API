<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EquipmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\UserExerciseController;

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
            Route::get('/search', [ExerciseController::class, 'search']);
            Route::get('/user/{userId}', [UserExerciseController::class, 'index']);
            Route::get('/user/{userId}/{id}', [UserExerciseController::class, 'show']);
            Route::get('/{id}', [ExerciseController::class, 'show']);
        });

        Route::group(['prefix'  =>  'categories'], function () {
            Route::get('/', [CategoryController::class, 'index']);
            Route::get('/search', [CategoryController::class, 'search']);
            Route::get('/{id}', [CategoryController::class, 'show']);
        });

        Route::group(['prefix'  =>  'equipment'], function () {
            Route::get('/', [EquipmentController::class, 'index']);
            Route::get('/search', [EquipmentController::class, 'search']);
            Route::get('/{id}', [EquipmentController::class, 'show']);
        });
    });

    Route::middleware('save')->group(function() {
        Route::group(['prefix' => 'exercises'], function() {
            Route::post('/user/{userId}', [UserExerciseController::class, 'save']);
        });
    });

    Route::middleware('delete')->group(function() {
        Route::group(['prefix' => 'exercises'], function() {
            Route::delete('/user/{userId}/{id}',[UserExerciseController::class, 'delete']);
        });
    });
});
