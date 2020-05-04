<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

class PriceImportFacade extends AbstractFacade implements PriceImportFacadeInterface
{
    public function import(string $path): void
    {
        $this->getFactory()->createImporter()->import($path);
    }
}
