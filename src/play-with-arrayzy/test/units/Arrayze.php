<?php declare(strict_types=1);

namespace App\tests\units;

require_once __DIR__ . '/../../Arrayze.php';

use atoum;

class Arrayze extends atoum
{
    public function testSayHi()
    {
        $this->given($this->newTestedInstance)
            ->then->string($this->testedInstance->sayHi())
            ->isEqualTo('hi');
    }

    public function testFlip()
    {
        $this->given($this->newTestedInstance)
            ->then->array($this->testedInstance->flip(['bar' => 'foo', 'foo' => 'bar']))
            ->isEqualTo(array_flip(['bar' => 'foo', 'foo' => 'bar']));
    }

    public function testReverse()
    {
        $this->given($this->newTestedInstance)
            ->then->array($this->testedInstance->reverse(['bar' => 'foo', 'foo' => 'bar']))
            ->isEqualTo(array_reverse(['bar' => 'foo', 'foo' => 'bar']));
    }
}