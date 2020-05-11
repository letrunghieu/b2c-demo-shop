<?php declare(strict_types=1);

namespace Pyz\Client\CustomerPrice\Plugin;

use Generated\Shared\Transfer\PriceProductTransfer;
use Pyz\Client\CustomerPrice\CustomerPriceFactory;
use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Zed\PriceProductExtension\Dependency\Plugin\PriceProductReaderPricesExtractorPluginInterface;

/** @method CustomerPriceFactory getFactory() */
class CustomerPriceExtractorPlugin extends AbstractPlugin implements PriceProductReaderPricesExtractorPluginInterface
{

    public function extractProductPricesForProductAbstract(array $priceProductTransfers): array
    {
        return $this->updateProductPriceTransfer($priceProductTransfers);
    }

    public function extractProductPricesForProductConcrete(array $priceProductTransfers): array
    {
        return $this->updateProductPriceTransfer($priceProductTransfers);
    }

    /**
     * @param PriceProductTransfer[] $priceProductTransfers
     * @return array
     */
    private function updateProductPriceTransfer(array $priceProductTransfers): array
    {
        $customerNumber = $this->getCustomerNumber();

        $customerPrice = $this->getFactory()
            ->createStorageReader()
            ->getPrices($customerNumber, 'How to get items number here?');

        foreach ($priceProductTransfers as $transfer) {
            $priceValue = (int) round($customerPrice->getValues()[0]->getPrice() * 100);
            $transfer->getMoneyValue()
                ->setGrossAmount($priceValue)
                ->setNetAmount($priceValue);
        }

        return $priceProductTransfers;
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
