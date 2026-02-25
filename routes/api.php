<?php

use App\Http\Controllers\StoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/stories')->name('stories.')->group(function(){
    Route::get('/', [StoryController::class, 'index'])->name('index');
    Route::post('/', [StoryController::class, 'store'])->name('store');
    Route::patch('/{story}', [StoryController::class, 'update'])->name('update');
    Route::delete('/{story}', [StoryController::class, 'destroy'])->name('destroy');
});