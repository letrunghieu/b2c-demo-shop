<?php declare(strict_types = 1);

namespace Pyz\Zed\HelloSpryker\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    public function indexAction(Request $request): array
    {
        $originalString = 'Hello Spryker!';
        $reversedString = $this->getFacade()->reverseString($originalString);

        return ['string' => $reversedString];
    }
}
