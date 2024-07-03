<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\MqttSubscribeCommand;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Artisan::command('mqtt:subscribe', function () {
    $this->call(MqttSubscribeCommand::class);
})->purpose('Subscribe to a MQTT topic and handle incoming messages')->hourly();
