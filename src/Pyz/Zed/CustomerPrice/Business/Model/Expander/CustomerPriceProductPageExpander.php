<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Business\Model\Expander;

use Generated\Shared\Transfer\ProductCustomerPricePayloadTransfer;
use Generated\Shared\Transfer\ProductPageLoadTransfer;
use Generated\Shared\Transfer\ProductPayloadTransfer;
use Pyz\Zed\CustomerPrice\Persistence\CustomerPriceRepositoryInterface;

class CustomerPriceProductPageExpander implements CustomerPriceProductPageExpanderInterface
{
    private const CUSTOMER_NUMBER_KEY = 'customer_number';
    private const PRICE_KEY = 'price';

    /** @var CustomerPriceRepositoryInterface */
    private $customerPriceRepository;

    public function __construct(CustomerPriceRepositoryInterface $customerPriceRepository)
    {
        $this->customerPriceRepository = $customerPriceRepository;
    }

    public function expandProductPageLoadTransferWithPricesData(
        ProductPageLoadTransfer $productPageLoadTransfer
    ): ProductPageLoadTransfer
    {
        $productAbstractIds = $productPageLoadTransfer->getProductAbstractIds();

        $customerPricesByProductAbstractId = $this->findPricesByIdProductAbstractIn($productAbstractIds);

        $productPageLoadTransfer->setPayloadTransfers(
            $this->updatePayloadTransfers($productPageLoadTransfer->getPayloadTransfers(), $customerPricesByProductAbstractId)
        );

        return $productPageLoadTransfer;
    }

    /**
     * @param string[] $productAbstractIds
     * @return array[]
     */
    private function findPricesByIdProductAbstractIn(array $productAbstractIds): array
    {
        $entityTransfers = $this->customerPriceRepository
            ->findCustomerPricesByItemIds($productAbstractIds);

        $customerPricesByProductAbstract = [];

        foreach ($entityTransfers as $transfer) {
            if ($transfer->getQuantity() !== 1) {
                continue;
            }

            $productAbstractId = $transfer->getItemNumber();
            $productCustomerPrices = $customerPricesByProductAbstract[$productAbstractId] ?? [];
            $productCustomerPrices[] = (new ProductCustomerPricePayloadTransfer())
                ->setCustomerNumber($transfer->getCustomerNumber())
                ->setPrice((int) round($transfer->getPrice() * 100));

            $customerPricesByProductAbstract[$productAbstractId] = $productCustomerPrices;
        }

        return $customerPricesByProductAbstract;
    }

    /**
     * @param ProductPayloadTransfer[] $productPageLoadTransfers
     * @param array $customerPricesByProductAbstractId
     * @return ProductPayloadTransfer[]
     */
    private function updatePayloadTransfers(array $productPageLoadTransfers, array $customerPricesByProductAbstractId): array
    {
        foreach ($productPageLoadTransfers as $payloadTransfer) {
            $customerPrices = $customerPricesByProductAbstractId[$payloadTransfer->getIdProductAbstract()] ?? [];

            foreach ($customerPrices as $price) {
                $payloadTransfer->addCustomerPrices($price);
            }
        }

        return $productPageLoadTransfers;
    }
}
