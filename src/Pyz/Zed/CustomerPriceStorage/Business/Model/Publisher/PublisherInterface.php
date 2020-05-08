<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPriceStorage\Business\Model\Publisher;

use Generated\Shared\Transfer\CustomerPriceTransfer;

interface PublisherInterface
{
    public function publish(CustomerPriceTransfer $customerPriceTransfer);
}
