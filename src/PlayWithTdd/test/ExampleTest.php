<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use function Domain\PlayWithTdd\add1;
use function Domain\PlayWithTdd\yilder;

require_once __DIR__ . '/../example1.php';

class ExampleTest extends TestCase
{
    public function testDummy()
    {
        $this->assertEquals(0, add1([]));
        $this->assertEquals(0, add1([0]));
        $this->assertEquals(1, add1([1]));
    }

    public function testYielder()
    {
        $this->assertInstanceOf(Traversable::class, yilder());
    }
}