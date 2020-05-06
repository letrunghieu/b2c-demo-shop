<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport;

use Pyz\Zed\PriceImport\Communication\Plugin\Configuration\PriceImportConfigurationPlugin;
use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class PriceImportDependencyProvider extends AbstractBundleDependencyProvider
{
    public const PRICE_IMPORT_MIDDLEWARE_PROCESSES = 'PRICE_IMPORT_MIDDLEWARE_PROCESSES';

    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = $this->addPriceImportProcesses($container);

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
}
