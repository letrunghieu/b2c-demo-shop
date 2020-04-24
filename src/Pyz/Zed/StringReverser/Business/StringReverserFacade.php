<?php declare(strict_types = 1);

namespace Pyz\Zed\StringReverser\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

class StringReverserFacade extends AbstractFacade implements StringReverserFacadeInterface
{
    public function reverseString(string $originalString): string
    {
        return $this->getFactory()->createStringReverser()->reverseString($originalString);
    }
}
