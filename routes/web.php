<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\ChangeContacts\ChangeContactsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\Manager\ManagerController;
use App\Http\Controllers\Dashboard\Report\ReportController;
use App\Http\Controllers\Dashboard\TokenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pages\CategoryController;
use App\Http\Controllers\Pages\ProductController;
use App\Http\Controllers\Pages\ServiceController;
use App\Http\Controllers\Pages\TrainingController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TimeTable\TimeTableController;
use App\Http\Controllers\Users\Search\MediatorSearchController;
use App\Http\Controllers\Users\UserController;
use App\Http\Middleware\ManagerMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\UserBlockedMiddleware;
use App\Http\Middleware\UserPublishedMiddleware;
use App\MoonShine\Controllers\MoonshineChangeContactController;
use App\MoonShine\Controllers\MoonshineDiplom;
use App\MoonShine\Controllers\MoonshineIndex;
use App\MoonShine\Controllers\MoonshineService;
use App\MoonShine\Controllers\MoonshineSetting;
use App\MoonShine\Controllers\MoonshineTraining;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;


/**
 * Auth
 */

Route::controller(SignInController::class)->group(function () {

    Route::get('/login', 'page')
        ->name('login')->middleware(RedirectIfAuthenticated::class);

    Route::post('/login', 'handlePhoneEmail')->name('login.handle');

});

Route::controller(SignUpController::class)->group(function () {

    Route::get('/sign-up', 'page')
        ->name('register')
        ->middleware(RedirectIfAuthenticated::class);

    Route::post('/sign-up', 'handle')->middleware(ProtectAgainstSpam::class)
        ->name('register.handle');

});

Route::controller(ForgotPasswordController::class)->group(function () {

    Route::get('/forgot-password', 'page')
        ->name('forgot')
        ->middleware(RedirectIfAuthenticated::class);

    Route::post('/forgot-password', 'handle')
        ->name('forgot.handel')
        ->middleware(RedirectIfAuthenticated::class);

});

Route::controller(ResetPasswordController::class)->group(function () {

    Route::get('/reset-password/{token}','page')
        ->name('password.reset')
        ->middleware(RedirectIfAuthenticated::class);

    Route::post('/reset-password', 'handle')
        ->name('password.handle')
        ->middleware(RedirectIfAuthenticated::class);

});

Route::controller(LogoutController::class)->group(function () {

    Route::post('/logout', 'page')->name('logout');

});

/**
 *  Auth
 */


/**
 *  Cabinet
 */

Route::controller(DashboardController::class)->group(function () {

    Route::get('/cabinet', 'page')
        ->name('cabinet')
        ->middleware(UserPublishedMiddleware::class);
       // ->middleware(UserPublishedMiddleware::class)
    ;


    Route::get('/cabinet/edit', 'edit')
        ->name('cabinet.edit')
        ->middleware(UserPublishedMiddleware::class);




    Route::get('/cabinet-blocked', 'blocked')
        ->name('blocked')
        ->middleware(UserBlockedMiddleware::class);


    Route::post('/cabinet/setting.handel', 'settingHandel')
        ->name('setting.handel')
        ->middleware(UserPublishedMiddleware::class);


    Route::post('/cabinet/setting_full.handel', 'settingFullHandel')
        ->name('setting_full.handel')
        ->middleware(UserPublishedMiddleware::class);



    Route::post('/cabinet/setting-password.handel', 'settingPasswordHandel')
        ->name('setting.password.handel')
        ->middleware(UserPublishedMiddleware::class);



});

/**
 *  Cabinet
 */

/**
 *  Отчеты
 */

Route::controller(ReportController::class)->group(function () {

    Route::get('/reports', 'reports')
        ->name('reports')
        ->middleware(UserPublishedMiddleware::class);

    Route::get('/reports/add', 'reportAdd')
        ->name('reports.add')
        ->middleware(UserPublishedMiddleware::class);


    Route::post('/reports/add.handel', 'reportAddHandel')
        ->name('reports_add.handel')
        ->middleware(UserPublishedMiddleware::class);
});


/**
 *  Отчеты
 */

/**
 *  Токены
 */

Route::controller(TokenController::class)->group(function () {

    Route::get('/token/{token}/user/{id}', 'update_user_self')
        ->name('update_user_self');

});


/**
 *  Токены
 */


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
    Route::get('/raspisanie/diplom', 'timetable_diplom')->name('timetable_diplom');
    Route::get('/raspisanie/{slug}', 'timetable_city')->name('timetable_city');
    Route::get('/raspisanie/{slug}/{lesson}', 'timetable_city_lesson')->name('timetable_city_lesson');
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
    Route::post('/set-city/city-action', 'city'); // записать город
    Route::post('/search/search-diplom-form', 'search_diplom'); // поиск диплома
    Route::post('/redirect/redirect-city-mounth', 'redirect_city_mounth'); // переадресация на стрнаицу города с нужным месяцем
    Route::post('/redirect/redirect-mounth-city', 'redirect_mounth_city'); // выдача расписания с нужным месяцем
    Route::post('/send-mail/order-sing-up-lesson', 'sing_up_lesson'); // запись на курсы
    Route::post('/send-mail/feedback', 'feedback'); // оставление отзывы о медиаторе
    Route::post('/generate/excel_report', 'generate_excel'); // сформировать excel очеты о медиации

    /* загрузка аватара*/ //
    Route::post('/cabinet/upload-avatar', 'uploadAvatar')->name('uploadAvatar');
    /* загрузка документов*/
    Route::post('/cabinet/upload-docs', 'uploadDocs')->name('uploadDocs');
    Route::post('/cabinet/delete-docs', 'deleteDocs')->name('deleteDocs');

});
/**
 * /// AjaxController
 */


/**
 * Категории
 */
Route::controller(CategoryController::class)->group(function () {
    Route::get('/o-nas/{slug}', 'category')->name('category');
    Route::get('/o-nas', 'categories')->name('categories');

});


/**
 * /////Категории
 */

/**
 * Продукты
 */
Route::controller(ProductController::class)->group(function () {
    Route::get('/o-nas/{gategory}/{slug}', 'product')->name('product');

});

/**
 * /////Продукты
 */

/**
 * Медиаторы
 */
Route::controller(UserController::class)->group(function () {
    Route::get('/reestr', 'reestr')->name('reestr');
    Route::get('/reestr/professionalnye-mediatory', 'prof_mediators')->name('prof_mediators');
    Route::get('/reestr/organizatsii-mediatorov', 'company_mediators')->name('company_mediators');
    Route::get('/reestr/neprofessionalnye-mediatory', 'notprof_mediators')->name('notprof_mediators');

    Route::get('/reestr/professionalnye-mediatory/{id}', 'prof_mediator')->name('prof_mediator');
    Route::get('/reestr/organizatsii-mediatorov/{id}', 'company_mediator')->name('company_mediator');
    Route::get('/reestr/neprofessionalnye-mediatory/{id}', 'notprof_mediator')->name('notprof_mediator');



});

/**
 * /////Медиаторы
 */

/**
 * контроллеры Moonshine
 */
Route::post('/moonshine/index', MoonshineIndex::class);
Route::post('/moonshine/training', MoonshineTraining::class);
Route::post('/moonshine/service', MoonshineService::class);
Route::post('/moonshine/setting', MoonshineSetting::class);
Route::post('/moonshine/diplom', MoonshineDiplom::class);

/**
 * /////контроллеры Moonshine
 */


Route::controller(MediatorSearchController::class)->group(function () {

    Route::post('/reestr/professionalnye-mediatory/search', 'prof_mediators_search')->name('prof_mediators_search');
    Route::post('/reestr/organizatsii-mediatorov/search', 'company_mediators_search')->name('company_mediators_search');
    Route::post('/reestr/neprofessionalnye-mediatory/search', 'notprof_mediators_search')->name('notprof_mediators_search');

});


Route::controller(TestController::class)->group(function () {

    Route::get('/test', 'test')->name('test');

});


/**
 * менеджеры
 */

Route::controller(ManagerController::class)->group(function () {
    Route::get('/m_users', 'users')
        ->name('m_users')
        ->middleware(ManagerMiddleware::class);

    Route::get('/m_users/user/{id}', 'user')
        ->name('m_user')
        ->middleware(ManagerMiddleware::class);

    Route::post('/m_users/search', 'user_search')
        ->name('search.users')
        ->middleware(ManagerMiddleware::class);

    Route::post('/m_users/blocked', 'blocked')
        ->name('blocked')
        ->middleware(ManagerMiddleware::class);

    Route::post('/m_users/unblock', 'unblock')
        ->name('unblock')
        ->middleware(ManagerMiddleware::class);


});

/**
 * менеджеры
 *


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
