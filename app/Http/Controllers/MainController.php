<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;

class MainController extends Controller
{
    public function dashboard()
    {
        return view('main.dashboard');
    }
    public function tabelPH()
    {
        return view('main.tabelPH');
    }
}
