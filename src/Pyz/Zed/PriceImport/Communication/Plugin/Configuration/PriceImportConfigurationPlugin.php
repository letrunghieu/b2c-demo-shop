<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Communication\Plugin\Configuration;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerMiddleware\Zed\Process\Communication\Plugin\Log\MiddlewareLoggerConfigPlugin;
use SprykerMiddleware\Zed\Process\Communication\Plugin\StreamReaderStagePlugin;
use SprykerMiddleware\Zed\Process\Communication\Plugin\StreamWriterStagePlugin;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ProcessConfigurationPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Iterator\ProcessIteratorPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Log\MiddlewareLoggerConfigPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\InputStreamPluginInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\OutputStreamPluginInterface;

class PriceImportConfigurationPlugin extends AbstractPlugin implements ProcessConfigurationPluginInterface
{
    private const PROCESS_NAME = 'PRICE_IMPORT_PROCESS';

    public function getProcessName(): string
    {
        return self::PROCESS_NAME;
    }

    public function getInputStreamPlugin(): InputStreamPluginInterface
    {
        return $this->getFactory()->getPriceImportInputStreamPlugin();
    }

    public function getOutputStreamPlugin(): OutputStreamPluginInterface
    {
        return $this->getFactory()->getPriceImportOutputStreamPlugin();
    }

    public function getIteratorPlugin(): ProcessIteratorPluginInterface
    {
        return $this->getFactory()->getPriceImportIteratorPlugin();
    }

    public function getStagePlugins(): array
    {
        return [
            new StreamReaderStagePlugin(),
            new StreamWriterStagePlugin(),
        ];
    }

    public function getLoggerPlugin(): MiddlewareLoggerConfigPluginInterface
    {
        return new MiddlewareLoggerConfigPlugin();
    }

    public function getPreProcessorHookPlugins(): array
    {
        return [];
    }

    public function getPostProcessorHookPlugins(): array
    {
        return [];
    }
}
