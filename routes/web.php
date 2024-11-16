<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ChangeContacts\ChangeContactsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pages\ServiceController;
use App\Http\Controllers\Pages\TrainingController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TimeTable\TimeTableController;
use App\MoonShine\Controllers\MoonshineChangeContactController;
use App\MoonShine\Controllers\MoonshineIndex;
use App\MoonShine\Controllers\MoonshineService;
use App\MoonShine\Controllers\MoonshineSetting;
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

Route::controller(ContactController::class)->group(function () {
    Route::get('/kontakty', 'page')->name('contacts');
});

/**
 * расписание
 */

Route::controller(TimeTableController::class)->group(function () {
    Route::get('/raspisanie', 'index')->name('timetable');
    Route::get('/raspisanie/{slug}', 'city')->name('timetable_city');
});

/**
 * расписание
 *
/**
 * AjaxController
 */
Route::controller(AjaxController::class)->group(function () {

    Route::post('/send-mail/order-call', 'OrderCall');
    Route::post('/send-mail/order-call-blue-form', 'OrderCallBlue_form');
    Route::post('/send-mail/bid', 'bid');
    Route::post('/set-city/city-action', 'city');



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
Route::post('/moonshine/setting', MoonshineSetting::class);

/**
 * /////контроллеры Moonshine
 */


Route::controller(TestController::class)->group(function () {

    Route::get('/test', 'test')->name('test');

});


/**
 */

/**
 * Вывод плавающих кнопок с функционалом замены
 */
Route::post('/moonshine/change-contacts', MoonshineChangeContactController::class);
Route::controller(ChangeContactsController::class)->group(function () {
    // начатие на один из типов контактов, и смена в зависимости от режима
    Route::post('/canche.contacts', 'canche_contacts');
});
/**

 */

Route::controller(PageController::class)->group(function () {

    Route::get('{page:slug}', 'page')->name('page');

});
