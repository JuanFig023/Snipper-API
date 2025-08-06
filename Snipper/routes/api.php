<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SnippetsController;

Route::get('/snippets', [SnippetsController::class, 'index']);
Route::get('/snippets/{id}', [SnippetsController::class, 'show']);
Route::post('/snippets', [SnippetsController::class, 'store']);
Route::put('/snippets/{id}', [SnippetsController::class, 'update']);
Route::delete('/snippets/{id}', [SnippetsController::class, 'destroy']);