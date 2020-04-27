<?php declare(strict_types = 1);

namespace Pyz\Zed\ApplicationDEMO\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

class IndexController extends AbstractController
{
    public function indexAction(): string
    {
        return 'Hello DEMO Store!!!';
    }
}
