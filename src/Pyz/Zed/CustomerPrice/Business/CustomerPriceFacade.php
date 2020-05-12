<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Business;

use Generated\Shared\Transfer\CustomerPriceTransfer;
use Generated\Shared\Transfer\ProductPageLoadTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\CustomerPrice\Business\CustomerPriceBusinessFactory getFactory()
 */
class CustomerPriceFacade extends AbstractFacade implements CustomerPriceFacadeInterface
{
    /**
     * @inheritDoc
     */
    public function parseFile(string $path): array
    {
        return $this->getFactory()->createReader()->parseFile($path);
    }

    public function saveCustomerPrice(CustomerPriceTransfer $customerPriceTransfer): void
    {
        $this->getFactory()->createWriter()->write($customerPriceTransfer);
    }

    public function expandProductPageLoadTransferWithPriceData(
        ProductPageLoadTransfer $productPageLoadTransfer
    ): ProductPageLoadTransfer
    {
        return $this->getFactory()
            ->createCustomerPriceProductPageExpander()
            ->expandProductPageLoadTransferWithPricesData($productPageLoadTransfer);
    }
}
