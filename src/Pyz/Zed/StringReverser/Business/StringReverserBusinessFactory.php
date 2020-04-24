<?php declare(strict_types = 1);

namespace Pyz\Zed\StringReverser\Business;

use Pyz\Zed\StringReverser\Business\Reverser\StringReverser;
use Pyz\Zed\StringReverser\Business\Reverser\StringReverserInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class StringReverserBusinessFactory extends AbstractBusinessFactory
{
    public function createStringReverser(): StringReverserInterface
    {
        return new StringReverser();
    }
}
