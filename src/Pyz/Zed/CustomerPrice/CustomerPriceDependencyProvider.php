<?php

namespace Pyz\Zed\CustomerPrice;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CustomerPriceDependencyProvider extends AbstractBundleDependencyProvider
{
    public const EVENT_FACADE = 'EVENT_FACADE';

    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container[self::EVENT_FACADE] = function (Container $container) {
            return $container->getLocator()->event()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        //TODO Provide dependencies

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function providePersistenceLayerDependencies(Container $container)
    {
        //TODO Provide dependencies

        return $container;
    }

}
