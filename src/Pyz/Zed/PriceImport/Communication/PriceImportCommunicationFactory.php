<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Communication;

use Pyz\Zed\PriceImport\PriceImportDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class PriceImportCommunicationFactory extends AbstractCommunicationFactory
{
    public function getPriceImportProcesses(): array
    {
        return $this->getProvidedDependency(PriceImportDependencyProvider::PRICE_IMPORT_MIDDLEWARE_PROCESSES);
    }
}
