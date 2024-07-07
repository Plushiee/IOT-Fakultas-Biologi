<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::post('/send/mqtt', [ApiController::class, 'sendMqtt'])->name('api.send.mqtt');
Route::post('/get/PH', [ApiController::class, 'getPH'])->name('api.get.PH');
Route::post('/get/TDS', [ApiController::class, 'getTDS'])->name('api.get.TDS');
Route::post('/get/udara', [ApiController::class, 'getUdara'])->name('api.get.udara');
Route::post('/get/arusair', [ApiController::class, 'getArusAir'])->name('api.get.arusAir');
