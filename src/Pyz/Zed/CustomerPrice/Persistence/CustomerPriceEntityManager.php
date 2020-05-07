<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Persistence;

use Generated\Shared\Transfer\PyzCustomerPriceEntityTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

class CustomerPriceEntityManager extends AbstractEntityManager implements CustomerPriceEntityManagerInterface
{
    public function saveCustomerPrice(PyzCustomerPriceEntityTransfer $entityTransfer): void {
        $this->save($entityTransfer);
    }
}
