<?php declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Arrayzy\ArrayImitator;

$data = ['a' => 'aa', 'b' => 'bb'];

$a = ArrayImitator::create($data);

var_dump($a->shuffle());
