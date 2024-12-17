<?php


use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('app:schedular')->dailyAt('09:00')->days([0,1,2,3,4]);
Schedule::command('app:complete')->dailyAt('20:00')->days([1,2,3,4,5]);
