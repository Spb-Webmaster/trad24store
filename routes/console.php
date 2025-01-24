<?php

use App\Console\Commands\Test;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

/*Schedule::call(function () {
    dd('hey');
})->daily();*/

Schedule::command(Test::class)->daily();

/*Schedule::command('app:example-command')->daily();*/

//Schedule::job(ExampleJob::class)->daily();
