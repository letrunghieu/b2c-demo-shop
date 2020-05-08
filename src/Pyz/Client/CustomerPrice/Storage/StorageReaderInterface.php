<?php declare(strict_types=1);

namespace Pyz\Client\CustomerPrice\Storage;

use Generated\Shared\Transfer\CustomerPriceTransfer;

interface StorageReaderInterface
{

    public function getPrices(string $customerNumber, string $itemNumber): CustomerPriceTransfer;
}
