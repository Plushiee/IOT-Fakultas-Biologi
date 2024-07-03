<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::post('/api/send-mqtt', [ApiController::class, 'sendMqtt'])->name('api.send.mqtt');
