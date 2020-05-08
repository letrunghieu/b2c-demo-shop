<?php declare(strict_types=1);

namespace Pyz\Client\CustomerPrice;

use Generated\Shared\Transfer\CustomerPriceTransfer;

interface CustomerPriceClientInterface
{

    public function getPrices(string $customerNumber, string $itemNumber): CustomerPriceTransfer;
}
