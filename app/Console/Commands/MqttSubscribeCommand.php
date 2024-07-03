<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\Facades\MQTT;
use App\Events\MqttSubscribeEvent;

class MqttSubscribeCommand extends Command
{
    // Definisikan nama dan deskripsi command
    protected $signature = 'mqtt:subscribe';
    protected $description = 'Subscribe to MQTT topics and handle incoming messages';

    public function __construct()
    {
        parent::__construct();
    }

    // Implementasi logika untuk berlangganan ke topik MQTT
    public function handle()
    {
        $mqtt = MQTT::connection();

        // Array of topics to subscribe
        $topics = [
            'fakbiologi/waterflow',
            'fakbiologi/totalmilliLiters',
            'fakbiologi/humidityDHT',
            'fakbiologi/temperatureDHT',
            'fakbiologi/TDS',
            'fakbiologi/ping',
            'fakbiologi/esp8266_1',
            'fakbiologi/error_1',
            'fakbiologi/esp8266_2',
            'fakbiologi/PH',
        ];

        // Subscribe to each topic
        foreach ($topics as $topic) {
            $mqtt->subscribe($topic, function (string $topic, string $message) {
                echo sprintf("Received message on topic [%s]: %s\n", $topic, $message);
                // Dispatch event with received message and topic
                event(new MqttSubscribeEvent($message, $topic));
            }, 0);
        }

        $mqtt->loop(true);

        return 0;
    }
}

