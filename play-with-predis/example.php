<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$client = new Predis\Client('redis://rediscloud:pKEHyZRJZ7Lx9FA9TqTRUUu2yUG5BbVH@redis-12774.c59.eu-west-1-2.ec2.cloud.redislabs.com:12774');

$data = ['offset' => 0, 'limit' => 10, 'provider' => 'zn', 'search' => 'song name'];

$key = \Ramsey\Uuid\Uuid::uuid1()->toString();

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