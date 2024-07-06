<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpMqtt\Client\Facades\MQTT;
use App\Models\TabelPHModel;

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

    public function getPH(Request $request)
    {
        $query = TabelPHModel::query();

        if ($request->has('start_time') && $request->has('end_time')) {
            $startTime = $this->validDate($request->input('start_time'));
            $endTime = $this->validDate($request->input('end_time'));
            $query->whereBetween('created_at', [$startTime, $endTime]);

            $ph = $query->get();
        } else {
            $ph = TabelPHModel::all();
        }

        if ($ph->isEmpty()) {
            return response()->json(['message' => 'Data tidak ditemukan!'], 404);
        }

        $formattedData = [
            'total' => $ph->count(),
            'totalNotFiltered' => TabelPHModel::count(),
            'rows' => $ph->map(function ($item) {
                return [
                    'timestamp' => $item->created_at->format('Y-m-d H:i:s'),
                    'id_area' => $item->id_area,
                    'ph' => $item->ph
                ];
            })->toArray()
        ];

        return response()->json($formattedData);
    }

    private function validDate($date)
    {
        $date = strtotime($date);
        return date('Y-m-d H:i:s', $date);
    }
}
