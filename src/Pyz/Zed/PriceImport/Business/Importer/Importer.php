<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport\Business\Importer;

use Generated\Shared\Transfer\PriceImportTransfer;
use Pyz\Zed\PriceImport\Persistence\PriceImportEntityManagerInterface;

class Importer implements ImporterInterface
{
    /** @var PriceImportEntityManagerInterface */
    private $priceImportEntityManager;

    public function __construct(PriceImportEntityManagerInterface $priceImportEntityManager)
    {
        $this->priceImportEntityManager = $priceImportEntityManager;
    }

    public function import(string $path)
    {
        $data = json_decode(file_get_contents($path), true);

        $priceImportTransfers = $this->convertToTransfer($data);

        $this->persist($priceImportTransfers);
    }

    private function convertToTransfer(array $importedData): array
    {
        $results = [];

        foreach ($importedData as $datum) {
            foreach ($datum['prices'] as $price) {
                $results[] = (new PriceImportTransfer())
                    ->setCustomerNumber((int)$datum['customer_number'])
                    ->setItemNumber((int)$datum['item_number'])
                    ->setQuantity((int)$price['quantity'])
                    ->setValue((double)$price['value']);
            }
        }

        return $results;
    }

    /**
     * @param PriceImportTransfer[] $priceImportTransfers
     */
    private function persist(array $priceImportTransfers): void
    {
        foreach($priceImportTransfers as $transfer) {
            $this->priceImportEntityManager->persist($transfer);
        }
    }
}
