<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Business\Model\Reader;

use Generated\Shared\Transfer\CustomerPriceTransfer;
use Generated\Shared\Transfer\CustomerPriceValueTransfer;

class JsonReader implements ReaderInterface
{
    /**
     * @param string $path
     * @return CustomerPriceTransfer[]
     */
    public function parseFile(string $path): array
    {
        $jsonData = json_decode(file_get_contents($path), true);

        $results = [];

        foreach ($jsonData as $datum) {
            $customerPriceTransfer = (new CustomerPriceTransfer())
                ->setCustomerNumber((string) $datum['customer_number'])
                ->setItemNumber((string) $datum['item_number']);

            foreach ($datum['prices'] as $price) {
                $customerPriceValueTransfer = (new CustomerPriceValueTransfer())
                    ->setQuantity((int) $price['quantity'])
                    ->setPrice((float) $price['value']);

                $customerPriceTransfer->addValues($customerPriceValueTransfer);
            }

            $results[] = $customerPriceTransfer;
        }

        return $results;
    }
}
