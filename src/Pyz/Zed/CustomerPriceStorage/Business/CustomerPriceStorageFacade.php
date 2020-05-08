<?php

namespace Pyz\Zed\CustomerPriceStorage\Business;

use Generated\Shared\Transfer\CustomerPriceTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\CustomerPriceStorage\Business\CustomerPriceStorageBusinessFactory getFactory()
 */
class CustomerPriceStorageFacade extends AbstractFacade implements CustomerPriceStorageFacadeInterface
{
    public function publish(CustomerPriceTransfer $customerPriceTransfer): void
    {
        $this->getFactory()->createPublisher()->publish($customerPriceTransfer);
    }
}
