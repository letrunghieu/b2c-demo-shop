<?php declare(strict_types=1);

namespace Pyz\Client\CustomerPrice\Plugin;

use Generated\Shared\Transfer\CustomerPriceValueTransfer;
use Generated\Shared\Transfer\ProductViewTransfer;
use Pyz\Client\CustomerPrice\CustomerPriceFactory;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\ProductStorageExtension\Dependency\Plugin\ProductViewExpanderPluginInterface;

/**
 * @method CustomerPriceFactory getFactory()
 */
class CustomerPriceProductsExpanderPlugin extends AbstractPlugin implements ProductViewExpanderPluginInterface
{

    public function expandProductViewTransfer(ProductViewTransfer $productViewTransfer, array $productData, $localeName)
    {
        $customerNumber = $this->getCustomerNumber();

        dd($productViewTransfer);

        $customerPrice = $this->getFactory()
            ->createStorageReader()
            ->getPrices($customerNumber, (string) $productViewTransfer->getSku());

        $prices = array_map(function(CustomerPriceValueTransfer $transfer) {
            return (int)round($transfer->getPrice() * 100);
        }, $customerPrice->getValues()->getArrayCopy());

//        dd($prices);

        if (empty($prices)) {
            return $productViewTransfer;
        }

        return $productViewTransfer->setPrice($prices[0])
            ->setPrices($prices);
    }

    private function getCustomerNumber(): string
    {
        $customerTransfer = $this->getFactory()->getCustomerClient()->getCustomer();

        if (!$customerTransfer) {
            return "";
        }

        return (string) $customerTransfer->getIdCustomer();
    }
}
