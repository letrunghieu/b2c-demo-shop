<?php declare(strict_types = 1);

namespace Pyz\Zed\HelloSpryker\Business\Reverser;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Pyz\Zed\StringReverser\Business\StringReverserFacadeInterface;

class StringReverser implements StringReverserInterface
{
    /** @var StringReverserFacadeInterface */
    private $stringReverserFacade;

    public function __construct(StringReverserFacadeInterface $stringReverserFacade)
    {
        $this->stringReverserFacade = $stringReverserFacade;
    }

    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        $reversedString = $this->stringReverserFacade->reverseString($helloSprykerTransfer->getOriginalString());
        $helloSprykerTransfer->setReversedString($reversedString);

        return $helloSprykerTransfer;
    }
}
