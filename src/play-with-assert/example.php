<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Assert\Assert;
use Assert\Assertion;

try {
    Assert::that(5)->between(1, 10);
    Assert::that("Foox")->nullOr()->string()->startsWith("Foo");
    Assert::that(1)->notEmpty()->integer();
    Assert::that('ss')->string();
    Assertion::digit("1sf");
    Assertion::nullOrMax(5, 4);
} catch (Throwable $exception) {
    echo $exception->getMessage();
}
