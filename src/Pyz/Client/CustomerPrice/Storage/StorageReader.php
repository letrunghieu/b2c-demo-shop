<?php declare(strict_types=1);

namespace Pyz\Client\CustomerPrice\Storage;

use Generated\Shared\Transfer\CustomerPriceTransfer;
use Spryker\Client\Storage\StorageClientInterface;

class StorageReader implements StorageReaderInterface
{
    /** @var StorageClientInterface */
    private $storageClient;

    public function __construct(StorageClientInterface $storageClient)
    {
        $this->storageClient = $storageClient;
    }

    public function getPrices(string $customerNumber, string $itemNumber): CustomerPriceTransfer
    {
        $key = $this->generateKey($customerNumber, $itemNumber);

        $customerPriceTransfer = new CustomerPriceTransfer();

        $storageData = $this->storageClient->get($key);

        $customerPriceTransfer = $customerPriceTransfer->fromArray($storageData, true);

        return $customerPriceTransfer;
    }

    private function generateKey(string $customerNumber, string $itemNumber)
    {
        return "customer_price:27_30";
    }
}
