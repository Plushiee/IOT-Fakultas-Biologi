<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpMqtt\Client\Facades\MQTT;

class ApiController extends Controller
{
    public function sendMqtt(Request $request)
    {
        $topic = $request->input('topic');
        $message = $request->input('message');

        MQTT::publish($topic, $message);

        // Kembalikan respon JSON
        return response()->json(['success' => 'Pesan MQTT berhasil dikirim!']);
    }
}
