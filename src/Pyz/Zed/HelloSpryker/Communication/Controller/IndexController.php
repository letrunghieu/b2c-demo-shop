<?php declare(strict_types = 1);

namespace Pyz\Zed\HelloSpryker\Communication\Controller;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    public function indexAction(Request $request): array
    {
        $helloSprykerTransfer = new HelloSprykerTransfer();
        $helloSprykerTransfer->setOriginalString('Hello Spryker!');

        $helloSprykerTransfer = $this->getFacade()->reverseString($helloSprykerTransfer);

        return ['string' => $helloSprykerTransfer->getReversedString()];
    }
}
