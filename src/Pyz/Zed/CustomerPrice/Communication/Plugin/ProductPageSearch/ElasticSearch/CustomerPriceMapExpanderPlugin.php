<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Communication\Plugin\ProductPageSearch\ElasticSearch;

use Generated\Shared\Transfer\CustomerPriceMapTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\PageMapTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\ProductPageSearchExtension\Dependency\PageMapBuilderInterface;
use Spryker\Zed\ProductPageSearchExtension\Dependency\Plugin\ProductAbstractMapExpanderPluginInterface;

class CustomerPriceMapExpanderPlugin extends AbstractPlugin implements ProductAbstractMapExpanderPluginInterface
{

    public function expandProductMap(PageMapTransfer $pageMapTransfer, PageMapBuilderInterface $pageMapBuilder, array $productData, LocaleTransfer $localeTransfer): PageMapTransfer
    {
        foreach ($productData['customer_prices'] as $customerPrice) {
            $pageMapTransfer->addCustomerPrices([
                'customer-number' => $customerPrice['customer_number'],
                'price' => $customerPrice['price']
            ]);
        }

        return $pageMapTransfer;
    }
}
