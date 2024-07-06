<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::post('/send-mqtt', [ApiController::class, 'sendMqtt'])->name('api.send.mqtt');
Route::post('/getPH', [ApiController::class, 'getPH'])->name('api.get.PH');
