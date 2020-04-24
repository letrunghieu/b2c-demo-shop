<?php declare(strict_types = 1);

namespace Pyz\Zed\HelloSpryker\Communication\Controller;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    public function indexAction(Request $request): array
    {
        $helloSprykerTransfer = (new HelloSprykerTransfer())
            ->setOriginalString('Hello Spryker!');

        // Reverse string.
        $helloSprykerTransfer = $this->getFacade()->reverseString($helloSprykerTransfer);

        // Create new row in DB.
        $helloSprykerTransfer = $this->getFacade()->createHelloSprykerEntity($helloSprykerTransfer);

        // Retrieve data from DB.
        $helloSprykerTransfer = $this->getFacade()->findHelloSpryker($helloSprykerTransfer);

        return ['string' => $helloSprykerTransfer->getReversedString()];
    }
}
