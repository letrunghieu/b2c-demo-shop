<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Persistence;

use Generated\Shared\Transfer\PyzCustomerPriceEntityTransfer;
use Orm\Zed\CustomerPrice\Persistence\PyzCustomerPriceQuery;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

class CustomerPriceRepository extends AbstractRepository implements CustomerPriceRepositoryInterface
{
    public function findOrCreateCustomerPriceEntitiesByCustomerItemAndQuantity(
        string $customerNumber,
        string $itemNumber,
        int $quantity
    ): PyzCustomerPriceEntityTransfer
    {
        $customerPrice = PyzCustomerPriceQuery::create()
            ->filterByCustomerNumber($customerNumber)
            ->filterByItemNumber($itemNumber)
            ->filterByQuantity($quantity)
            ->findOneOrCreate();

        $customerPriceEntityTransfer = new PyzCustomerPriceEntityTransfer();

        $customerPriceEntityTransfer->fromArray($customerPrice->toArray());

        return $customerPriceEntityTransfer;
    }
}
