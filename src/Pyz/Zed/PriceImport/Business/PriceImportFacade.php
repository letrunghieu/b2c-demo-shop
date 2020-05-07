<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport\Business;

use Generated\Shared\Transfer\PriceImportTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

class PriceImportFacade extends AbstractFacade implements PriceImportFacadeInterface
{
    public function import(string $path): void
    {
        $this->getFactory()->createImporter()->import($path);
    }

    public function handlePriceParsedEvent(PriceImportTransfer $transfer): void
    {
        $this->getFactory()->createWriter()->write($transfer);
    }
}
