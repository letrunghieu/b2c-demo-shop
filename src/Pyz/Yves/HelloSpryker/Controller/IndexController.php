<?php declare(strict_types = 1);

namespace Pyz\Yves\HelloSpryker\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;
use Spryker\Yves\Kernel\View\View;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    public function indexAction(Request $request): View
    {
        $data = ['reversedString' => 'Hello Spryker!'];

        return $this->view(
            $data,
            [],
            '@HelloSpryker/views/index/index.twig'
        );
    }
}
