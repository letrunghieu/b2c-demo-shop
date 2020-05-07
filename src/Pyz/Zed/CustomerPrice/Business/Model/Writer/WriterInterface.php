<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Business\Model\Writer;

use Generated\Shared\Transfer\CustomerPriceTransfer;

interface WriterInterface
{

    public function write(CustomerPriceTransfer $customerPriceTransfer): void;
}
