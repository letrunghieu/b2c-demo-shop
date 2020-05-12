<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Communication\Plugin\PageDataLoader;

use Generated\Shared\Transfer\ProductPageLoadTransfer;
use Pyz\Zed\CustomerPrice\Business\CustomerPriceFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearchExtension\Dependency\Plugin\ProductPageDataLoaderPluginInterface;

/**
 * @method CustomerPriceFacadeInterface getFacade()()
 */
class CustomerPricePageDataLoaderPlugin extends AbstractPlugin implements ProductPageDataLoaderPluginInterface
{

    public function expandProductPageDataTransfer(ProductPageLoadTransfer $loadTransfer)
    {
        $this->getFacade()
            ->expandProductPageLoadTransferWithPriceData($loadTransfer);
    }
}
