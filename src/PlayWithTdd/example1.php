<?php

declare(strict_types=1);

namespace Domain\PlayWithTdd;
require __DIR__ . '/../../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

function example(){
    return new class(){
        function __construct()
        {
            $this->foo = Uuid::uuid1()->toString();
        }
    };
}


function add1(array $args): int
{
    return array_sum($args);
}

function yilder()
{
    yield from [1, 2, 3];
}

$result = example();
var_dump($result);

function typedParamsExample(int ...$values): int 
{
    return array_sum($values);
}

$a = typedParamsExample(1, 2, 3, 4, 5);
$b = typedParamsExample(...range(1, 5));

assert($a === $b, 'Values are not equals');

assert($x == true);
