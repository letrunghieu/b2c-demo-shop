<?php declare(strict_types = 1);

namespace Pyz\Client\Catalog;

use Spryker\Client\Cart\CartClientInterface;
use Spryker\Client\Catalog\CatalogFactory as SprykerCatalogFactory;
use Spryker\Client\ProductStorage\ProductStorageClientInterface;

class CatalogFactory extends SprykerCatalogFactory
{
    public function getCartClient(): CartClientInterface
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CLIENT_CART);
    }

    public function getProductStorageClient(): ProductStorageClientInterface
    {
        return $this->getProvidedDependency(CatalogDependencyProvider::CLIENT_PRODUCT_STORAGE);
    }
}
