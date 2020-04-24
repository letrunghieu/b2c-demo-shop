<?php declare(strict_types = 1);

namespace Pyz\Zed\StringReverser\Business\Reverser;

use Generated\Shared\Transfer\HelloSprykerTransfer;

class StringReverser implements StringReverserInterface
{

    public function reverseString(string $originalString): string
    {
        return strrev($originalString);
    }
}
