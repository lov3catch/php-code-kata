<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use Doctrine\Common\Collections\ArrayCollection;

$collection = new ArrayCollection([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);

$callbackFactory = static function (int $gte) {
    return function (int $insert)  use ($gte) {
        return $insert > $gte;
    };
};

$take2 = $callbackFactory(6);

$inc1 = static function ($element) {
    return $element + 1;
};

$sum = static function ($element, int $sum = 0) {
    return $sum + $element;
};

$filteredCollection = $collection
    ->filter($take2)
    ->map($inc1)
    ->reduce($sum);

echo 'SUM: ' . $filteredCollection . PHP_EOL;