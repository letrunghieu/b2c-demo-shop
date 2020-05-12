<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Business\Model\Expander;

use Generated\Shared\Transfer\ProductPageLoadTransfer;

interface CustomerPriceProductPageExpanderInterface
{

    public function expandProductPageLoadTransferWithPricesData(ProductPageLoadTransfer $productPageLoadTransfer): ProductPageLoadTransfer;
}
