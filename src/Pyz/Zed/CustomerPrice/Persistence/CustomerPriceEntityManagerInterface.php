<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Persistence;

use Generated\Shared\Transfer\PyzCustomerPriceEntityTransfer;

interface CustomerPriceEntityManagerInterface
{
    public function saveCustomerPrice(PyzCustomerPriceEntityTransfer $entityTransfer): void;
}
