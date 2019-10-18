<?php

declare(strict_types=1);

namespace Domain\PlayWithTdd;

function add1(array $args): int
{
    return array_sum($args);
}

function yilder()
{
    yield from [1, 2, 3];
}