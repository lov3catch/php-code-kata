<?php

declare(strict_types=1);

use Psr\Http\Message\ServerRequestInterface;
use React\EventLoop\Factory;
use React\Http\Response;
use React\Http\Server;

require __DIR__ . '/../../vendor/autoload.php';

$loop = Factory::create();

$loop->addPeriodicTimer(5, function (){echo 'ok';});
$loop->addPeriodicTimer(3, function (){echo 'a-a-a';});
$loop->run();
