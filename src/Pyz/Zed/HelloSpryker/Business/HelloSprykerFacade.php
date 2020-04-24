<?php declare(strict_types = 1);

namespace Pyz\Zed\HelloSpryker\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

class HelloSprykerFacade extends AbstractFacade implements HelloSprykerFacadeInterface
{

    public function reverseString(string $stringToReverse): string
    {
        return $this->getFactory()
            ->createStringReverser()
            ->reverseString($stringToReverse);
    }
}
