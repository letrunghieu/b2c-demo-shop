<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Business;

use Generated\Shared\Transfer\CustomerPriceTransfer;

interface CustomerPriceFacadeInterface
{
    public function saveCustomerPrice(CustomerPriceTransfer $customerPriceTransfer): void;

    /**
     * @param string $path
     * @return CustomerPriceTransfer[]
     */
    public function parseFile(string $path): array;
}
