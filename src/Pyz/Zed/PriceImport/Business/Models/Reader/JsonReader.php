<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Business\Models\Reader;

use Generated\Shared\Transfer\PriceImportTransfer;

class JsonReader implements ReaderInterface
{
    public function parseFile(string $path): array
    {
        $data = json_decode(file_get_contents($path), true);

        return $this->convertToTransfer($data);
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
}
