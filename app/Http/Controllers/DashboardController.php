<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('main.dashboard');
    }
}
