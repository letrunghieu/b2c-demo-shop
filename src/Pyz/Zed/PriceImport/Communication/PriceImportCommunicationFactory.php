<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport\Communication;

use Pyz\Zed\PriceImport\PriceImportDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Iterator\ProcessIteratorPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\InputStreamPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\OutputStreamPluginInterface;

class PriceImportCommunicationFactory extends AbstractCommunicationFactory
{
    public function getPriceImportProcesses(): array
    {
        return $this->getProvidedDependency(PriceImportDependencyProvider::PRICE_IMPORT_MIDDLEWARE_PROCESSES);
    }

    public function getPriceImportInputStreamPlugin(): InputStreamPluginInterface
    {
        return $this->getProvidedDependency(PriceImportDependencyProvider::PRICE_IMPORT_INPUT_STREAM_PLUGIN);
    }

    public function getPriceImportOutputStreamPlugin(): OutputStreamPluginInterface
    {
        return $this->getProvidedDependency(PriceImportDependencyProvider::PRICE_IMPORT_OUTPUT_STREAM_PLUGIN);
    }

    public function getPriceImportIteratorPlugin(): ProcessIteratorPluginInterface
    {
        return $this->getProvidedDependency(PriceImportDependencyProvider::PRICE_IMPORT_ITERATOR_PLUGIN);
    }
}
