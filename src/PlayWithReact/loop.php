<?php

declare(strict_types=1);

namespace Domain\PlayWithReact;

use React\EventLoop\Factory;

require __DIR__ . '/../../vendor/autoload.php';

$loop = Factory::create();

$server = stream_socket_server('tcp://127.0.0.1:8080');
stream_set_blocking($server, false);

$loop->addReadStream($server, static function ($server) use ($loop) {
    $conn = stream_socket_accept($server);
    $data = "HTTP/1.1 200 OK\r\nContent-Length: 3\r\n\r\nHi\n";


    $loop->addWriteStream($conn, static function ($conn) use (&$data, $loop) {
        $written = fwrite($conn, $data);
        if ($written === strlen($data)) {
            fclose($conn);
            $loop->removeWriteStream($conn);
        } else {
            $data = substr($data, $written);
        }
    });
});

$loop->addPeriodicTimer(5, static function () {
    $memory = memory_get_usage() / 1024;
    $formatted = number_format($memory, 3) . 'K';
    echo "Current memory usage: {$formatted}\n";
});

$loop->run();
