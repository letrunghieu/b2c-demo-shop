<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPriceStorage\Persistence;

use Generated\Shared\Transfer\CustomerPriceTransfer;
use Generated\Shared\Transfer\PyzCustomerPriceStorageEntityTransfer;
use Orm\Zed\CustomerPriceStorage\Persistence\PyzCustomerPriceStorage;
use Orm\Zed\CustomerPriceStorage\Persistence\PyzCustomerPriceStorageQuery;

interface CustomerPriceStorageEntityManagerInterface
{

    public function saveCustomerPrice(PyzCustomerPriceStorageEntityTransfer $entityTransfer): void;

    public function saveEntity(CustomerPriceTransfer $customerPriceTransfer): void;
}
