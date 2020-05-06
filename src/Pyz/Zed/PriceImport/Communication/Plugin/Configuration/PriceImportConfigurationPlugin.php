<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Communication\Plugin\Configuration;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
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
        // TODO: Implement getInputStreamPlugin() method.
    }

    public function getOutputStreamPlugin(): OutputStreamPluginInterface
    {
        // TODO: Implement getOutputStreamPlugin() method.
    }

    public function getIteratorPlugin(): ProcessIteratorPluginInterface
    {
        // TODO: Implement getIteratorPlugin() method.
    }

    public function getStagePlugins(): array
    {
        // TODO: Implement getStagePlugins() method.
    }

    public function getLoggerPlugin(): MiddlewareLoggerConfigPluginInterface
    {
        // TODO: Implement getLoggerPlugin() method.
    }

    public function getPreProcessorHookPlugins(): array
    {
        // TODO: Implement getPreProcessorHookPlugins() method.
    }

    public function getPostProcessorHookPlugins(): array
    {
        // TODO: Implement getPostProcessorHookPlugins() method.
    }
}
