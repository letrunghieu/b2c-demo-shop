<?php declare(strict_types = 1);

namespace Pyz\Zed\Application\Communication\Controller;

use Spryker\Zed\Application\Communication\Controller\IndexController as SprykerIndexController;

class IndexController extends SprykerIndexController
{
    public function indexAction(): string
    {
        return 'Hello DE store!';
    }
}
