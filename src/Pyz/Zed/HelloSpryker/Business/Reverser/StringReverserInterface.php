<?php declare(strict_types = 1);

namespace Pyz\Zed\HelloSpryker\Business\Reverser;

interface StringReverserInterface
{
    public function reverseString(string $stringToReverse): string;
}
