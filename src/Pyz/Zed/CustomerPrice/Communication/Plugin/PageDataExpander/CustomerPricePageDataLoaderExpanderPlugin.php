<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Communication\Plugin\PageDataExpander;

use Generated\Shared\Transfer\ProductCustomerPricePayloadTransfer;
use Generated\Shared\Transfer\ProductPageLoadTransfer;
use Generated\Shared\Transfer\ProductPageSearchTransfer;
use Generated\Shared\Transfer\ProductPayloadTransfer;
use Spryker\Shared\ProductPageSearch\ProductPageSearchConfig;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearch\Dependency\Plugin\ProductPageDataExpanderInterface;

class CustomerPricePageDataLoaderExpanderPlugin extends AbstractPlugin implements ProductPageDataExpanderInterface
{
    public function expandProductPageData(array $productData, ProductPageSearchTransfer $productAbstractPageSearchTransfer)
    {
        /** @var ProductPayloadTransfer $productPayloadTransfer */
        $productPayloadTransfer = $productData[ProductPageSearchConfig::PRODUCT_ABSTRACT_PAGE_LOAD_DATA];

        $customerNumbers = [];
        foreach($productPayloadTransfer->getCustomerPrices() as $customerPricePayloadTransfer) {
            $productAbstractPageSearchTransfer->addCustomerPrices($customerPricePayloadTransfer);

            $customerNumbers[] = $customerPricePayloadTransfer->getCustomerNumber();
        }

        $productAbstractPageSearchTransfer->setCustomerPriceCustomerNumbers($customerNumbers);
    }
}
