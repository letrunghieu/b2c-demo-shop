<?php declare(strict_types = 1);

namespace Pyz\Zed\HelloSpryker\Business;

use Pyz\Zed\HelloSpryker\Business\Reverser\StringReverser;
use Pyz\Zed\HelloSpryker\Business\Reverser\StringReverserInterface;

class HelloSprykerBusinessFactory
{
    public function createStringReverser(): StringReverserInterface
    {
        return new StringReverser();
    }
}
