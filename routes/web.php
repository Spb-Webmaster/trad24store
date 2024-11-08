<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pages\ServiceController;
use App\Http\Controllers\Pages\TrainingController;
use App\Http\Controllers\Pages\PageController;
use Illuminate\Support\Facades\Route;

/**
 * страницы
 */
Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')
        ->name('home');
});

Route::controller(TrainingController::class)->group(function () {

    Route::get('/obuchenie/{slug}', 'training')
        ->name('training');
});

Route::controller(ServiceController::class)->group(function () {

    Route::get('/uslugi/{slug}', 'service')
        ->name('service');
});


Route::controller(PageController::class)->group(function () {

    Route::get('{page:slug}', 'page')->name('page');

});
