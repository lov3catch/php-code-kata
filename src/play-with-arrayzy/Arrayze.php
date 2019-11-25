<?php declare(strict_types=1);

namespace App;

use Arrayzy\ArrayImitator;

require __DIR__ . '/../vendor/autoload.php';

class Arrayze
{
    public function reverse(array $data): array
    {
        $a = new ArrayImitator($data);
        return $a->reverse()->toArray();
    }

    public function flip(array $data): array
    {
        /**
         * @param ArrayImitator
         */
        return (ArrayImitator::create($data))->flip()->toArray();
    }

    public function sayHi(): string
    {
        return 1;
#        return 'hi';
    }
}
