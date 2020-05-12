<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Persistence;

use Generated\Shared\Transfer\PyzCustomerPriceEntityTransfer;
use Orm\Zed\CustomerPrice\Persistence\PyzCustomerPriceQuery;

interface CustomerPriceRepositoryInterface
{

    public function findOrCreateCustomerPriceEntitiesByCustomerItemAndQuantity(string $customerNumber, string $itemNumber, int $quantity): PyzCustomerPriceEntityTransfer;

    /**
     * @param string[] $ids
     * @return PyzCustomerPriceEntityTransfer[]
     */
    public function findCustomerPricesByItemIds(array $ids): array;
}
