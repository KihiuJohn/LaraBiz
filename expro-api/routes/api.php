<?php


use App\Http\Controllers\API\BlogPostController;
use App\Http\Controllers\API\CategoryController;

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

Route::post('/csrf-test', function () {
    return response()->json(['message' => 'CSRF passed'], 200);
});

