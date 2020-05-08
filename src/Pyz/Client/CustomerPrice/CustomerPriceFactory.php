<?php declare(strict_types=1);

namespace Pyz\Client\CustomerPrice;

use Pyz\Client\CustomerPrice\Storage\StorageReader;
use Pyz\Client\CustomerPrice\Storage\StorageReaderInterface;
use Spryker\Client\Customer\CustomerClientInterface;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Storage\StorageClientInterface;

class CustomerPriceFactory extends AbstractFactory
{
    public function createStorageReader(): StorageReaderInterface
    {
        return new StorageReader($this->getStorageClient());
    }

    public function getCustomerClient(): CustomerClientInterface
    {
        return $this->getProvidedDependency(CustomerPriceDependencyProvider::CUSTOMER_CLIENT);
    }

    private function getStorageClient(): StorageClientInterface
    {
        return $this->getProvidedDependency(CustomerPriceDependencyProvider::STORAGE_CLIENT);
    }
}
