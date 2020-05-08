<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPriceStorage;

use Spryker\Zed\Kernel\AbstractBundleConfig;

class CustomerPriceStorageConfig extends AbstractBundleConfig
{
    const CUSTOMER_PRICE_SYNC_STORAGE_QUEUE = 'sync.storage.customer_price';

    const CUSTOMER_PRICE_SYNC_STORAGE_ERROR_QUEUE = 'sync.storage.customer_price.error';
}
