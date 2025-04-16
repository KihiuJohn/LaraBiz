<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BlogPostController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PageController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\ConsultingServiceController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {
    // Blog Post Routes
    Route::get('/blog-posts', [BlogPostController::class, 'index']);
    Route::get('/blog-posts/{id}', [BlogPostController::class, 'show']);
    Route::post('/blog-posts', [BlogPostController::class, 'store']);
    Route::put('/blog-posts/{id}', [BlogPostController::class, 'update']);
    Route::delete('/blog-posts/{id}', [BlogPostController::class, 'destroy']);

    // Category Routes
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{id}', [CategoryController::class, 'show']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::put('/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

    // Page Routes
    Route::get('/pages/{slug}', [PageController::class, 'show']);
    Route::put('/pages/{slug}', [PageController::class, 'update']);

    // Program Routes
    Route::get('/programs', [ProgramController::class, 'index']);
    Route::get('/programs/{identifier}', [ProgramController::class, 'show']);
    Route::post('/programs', [ProgramController::class, 'store']);
    Route::put('/programs/{id}', [ProgramController::class, 'update']);
    Route::delete('/programs/{id}', [ProgramController::class, 'destroy']);

    // Consulting Service Routes
    Route::get('/consulting-services', [ConsultingServiceController::class, 'index']);
    Route::get('/consulting-services/{id}', [ConsultingServiceController::class, 'show']);
    Route::post('/consulting-services', [ConsultingServiceController::class, 'store']);
    Route::put('/consulting-services/{id}', [ConsultingServiceController::class, 'update']);
    Route::delete('/consulting-services/{id}', [ConsultingServiceController::class, 'destroy']);

    // Test CSRF Route
    Route::post('/csrf-test', function () {
        return response()->json(['message' => 'CSRF passed'], 200);
    });
});
