<?php declare(strict_types=1);

namespace Domain\PlayWithPredis;

require_once __DIR__ . '/../../vendor/autoload.php';

use Predis\Client;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Dotenv\Dotenv;

(new Dotenv())->load(__DIR__ . '/../../.env');

$client = new Client($_ENV['REDIS_URI']);

$data = [
    'offset'   => 0,
    'limit'    => 10,
    'provider' => 'zn',
    'search'   => 'song name'
];

$key = Uuid::uuid1()->toString();

echo 'uploading' . PHP_EOL;
$client->set($key, json_encode($data));

echo 'getting' . PHP_EOL;
echo $client->get($key);

echo 'changing' . PHP_EOL;
$newData = json_decode($client->get($key), true);
$newData['offset'] = $newData['offset'] + 10;

echo 'uploading' . PHP_EOL;
$client->set($key, json_encode($newData));

echo 'getting' . PHP_EOL;
echo $client->get($key);

echo '' . PHP_EOL;
var_dump($client->get('has-no-this-key'));