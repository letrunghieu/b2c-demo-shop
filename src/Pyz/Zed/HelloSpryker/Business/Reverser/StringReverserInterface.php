<?php declare(strict_types = 1);

namespace Pyz\Zed\HelloSpryker\Business\Reverser;

use Generated\Shared\Transfer\HelloSprykerTransfer;

interface StringReverserInterface
{
    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer;
}
