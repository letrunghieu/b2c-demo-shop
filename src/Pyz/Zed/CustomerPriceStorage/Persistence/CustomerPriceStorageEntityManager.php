<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPriceStorage\Persistence;

use Generated\Shared\Transfer\CustomerPriceTransfer;
use Generated\Shared\Transfer\PyzCustomerPriceStorageEntityTransfer;
use Orm\Zed\CustomerPriceStorage\Persistence\PyzCustomerPriceStorage;
use Orm\Zed\CustomerPriceStorage\Persistence\PyzCustomerPriceStorageQuery;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

class CustomerPriceStorageEntityManager extends AbstractEntityManager implements CustomerPriceStorageEntityManagerInterface
{
    public function saveCustomerPrice(PyzCustomerPriceStorageEntityTransfer $entityTransfer): void
    {
        $this->save($entityTransfer);
    }

    public function saveEntity(CustomerPriceTransfer $customerPriceTransfer): void
    {
        $key = $this->getKey($customerPriceTransfer);

        PyzCustomerPriceStorageQuery::create()
            ->filterByFkCustomerPrice($key)
            ->delete();

        $customerPriceStorage = new PyzCustomerPriceStorage();

        $customerPriceStorage->setData($customerPriceTransfer->toArray())
            ->setKey($key)
            ->setFkCustomerPrice($key)
            ;

        $customerPriceStorage->save();
    }

    private function getKey(CustomerPriceTransfer $customerPriceTransfer) {
        return "{$customerPriceTransfer->getCustomerNumber()}_{$customerPriceTransfer->getItemNumber()}";
    }
}
