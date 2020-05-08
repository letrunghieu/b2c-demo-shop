<?php declare(strict_types=1);

namespace Pyz\Client\CustomerPrice;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;

class CustomerPriceDependencyProvider extends AbstractDependencyProvider
{
    public const STORAGE_CLIENT = 'STORAGE_CLIENT';
    public const CUSTOMER_CLIENT = 'CUSTOMER_CLIENT';

    public function provideServiceLayerDependencies(Container $container): Container
    {
        $container = parent::provideServiceLayerDependencies($container);

        $container = $this->addStorageClient($container);
        $container = $this->addCustomerClient($container);

        return $container;
    }

    private function addStorageClient(Container $container): Container
    {
        $container[self::STORAGE_CLIENT] = function (Container $container) {
            return $container->getLocator()->storage()->client();
        };
        return $container;
    }

    private function addCustomerClient(Container $container): Container
    {
        $container[self::CUSTOMER_CLIENT] = function (Container $container) {
            return $container->getLocator()->customer()->client();
        };
        return $container;
    }
}
