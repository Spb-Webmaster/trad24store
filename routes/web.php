<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pages\ServiceController;
use App\Http\Controllers\Pages\TrainingController;
use App\Http\Controllers\Pages\PageController;
use App\MoonShine\Controllers\MoonshineIndex;
use App\MoonShine\Controllers\MoonshineService;
use App\MoonShine\Controllers\MoonshineTraining;
use Illuminate\Support\Facades\Route;

/**
 * страницы
 */
Route::controller(HomeController::class)->group(function () {

    Route::get('/', 'index')
        ->name('home');
});

Route::controller(TrainingController::class)->group(function () {

    Route::get('/obuchenie/{slug}', 'training')->name('training');
    Route::get('/obuchenie', 'trainings')->name('trainings');

});

Route::controller(ServiceController::class)->group(function () {

    Route::get('/uslugi/{slug}', 'service')->name('service');
    Route::get('/uslugi', 'services')->name('services');
});
/**
 * AjaxController
 */
Route::controller(AjaxController::class)->group(function () {

    Route::post('/send-mail/order-call', 'OrderCall');
    Route::post('/send-mail/order-call-blue-form', 'OrderCallBlue_form');


    /* загрузка аватара*/ // нет метода!!31.08 todo
    Route::post('/cabinet/upload-avatar', 'uploadAvatar')->name('uploadAvatar');

});



/**
 * /// AjaxController
 */

/**
 * контроллеры Moonshine
 */
Route::post('/moonshine/index', MoonshineIndex::class);
Route::post('/moonshine/training', MoonshineTraining::class);
Route::post('/moonshine/service', MoonshineService::class);

/**
 * /////контроллеры Moonshine
 */

Route::controller(PageController::class)->group(function () {

    Route::get('{page:slug}', 'page')->name('page');

});
