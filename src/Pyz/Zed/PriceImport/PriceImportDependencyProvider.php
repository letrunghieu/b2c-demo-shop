<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport;

use Pyz\Zed\PriceImport\Communication\Plugin\Configuration\PriceImportConfigurationPlugin;
use Pyz\Zed\PriceImport\Communication\Plugin\Stream\PriceImportStreamPlugin;
use Pyz\Zed\PriceImport\Communication\Plugin\Stream\PriceImportWriteStreamPlugin;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use SprykerMiddleware\Zed\Process\Communication\Plugin\Iterator\NullIteratorPlugin;
use SprykerMiddleware\Zed\Process\Communication\Plugin\Stream\JsonInputStreamPlugin;

class PriceImportDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PRICE_IMPORT_MIDDLEWARE_PROCESSES = 'PRICE_IMPORT_MIDDLEWARE_PROCESSES';
    public const PRICE_IMPORT_INPUT_STREAM_PLUGIN = 'PRICE_IMPORT_INPUT_STREAM_PLUGIN';
    public const PRICE_IMPORT_OUTPUT_STREAM_PLUGIN = 'PRICE_IMPORT_OUTPUT_STREAM_PLUGIN';
    public const PRICE_IMPORT_ITERATOR_PLUGIN = 'PRICE_IMPORT_ITERATOR_PLUGIN';

    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = $this->addPriceImportProcesses($container);
        $container = $this->addPriceImportProcessPlugins($container);

        return $container;
    }

    private function addPriceImportProcesses(Container $container): Container
    {
        $container[self::PRICE_IMPORT_MIDDLEWARE_PROCESSES] = function () {
            return [
                new PriceImportConfigurationPlugin(),
            ];
        };

        return $container;
    }

    private function addPriceImportProcessPlugins(Container $container): Container
    {
        $container[self::PRICE_IMPORT_INPUT_STREAM_PLUGIN] = function () {
            return new PriceImportStreamPlugin();
        };

        $container[self::PRICE_IMPORT_OUTPUT_STREAM_PLUGIN] = function () {
            return new PriceImportWriteStreamPlugin();
        };

        $container[self::PRICE_IMPORT_ITERATOR_PLUGIN] = function () {
            return new NullIteratorPlugin();
        };

        return $container;
    }
}
