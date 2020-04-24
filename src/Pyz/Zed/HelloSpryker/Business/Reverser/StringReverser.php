<?php declare(strict_types = 1);

namespace Pyz\Zed\HelloSpryker\Business\Reverser;

class StringReverser implements StringReverserInterface
{

    public function reverseString(string $stringToReverse): string
    {
        return strrev($stringToReverse);
    }
}
