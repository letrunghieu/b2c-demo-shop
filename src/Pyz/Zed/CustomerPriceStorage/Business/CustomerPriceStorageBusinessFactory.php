<?php

namespace Pyz\Zed\CustomerPriceStorage\Business;

use Pyz\Zed\CustomerPriceStorage\Business\Model\Publisher\DefaultPublisher;
use Pyz\Zed\CustomerPriceStorage\Business\Model\Publisher\PublisherInterface;
use Pyz\Zed\CustomerPriceStorage\Persistence\CustomerPriceStorageEntityManagerInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\CustomerPriceStorage\CustomerPriceStorageConfig getConfig()
 * @method CustomerPriceStorageEntityManagerInterface getEntityManager()
 */
class CustomerPriceStorageBusinessFactory extends AbstractBusinessFactory
{
    public function createPublisher(): PublisherInterface
    {
        return new DefaultPublisher($this->getEntityManager());
    }
}
