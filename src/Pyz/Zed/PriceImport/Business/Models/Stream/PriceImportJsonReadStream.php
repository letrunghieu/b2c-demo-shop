<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport\Business\Models\Stream;

use Generated\Shared\Transfer\PriceImportTransfer;
use SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface;

class PriceImportJsonReadStream implements ReadStreamInterface
{
    /** @var string */
    private $filePath;

    /** @var \ArrayIterator */
    private $internalIterator;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function read()
    {
        $item = $this->internalIterator->current();

        $this->internalIterator->next();

        return $item;
    }

    public function open(): bool
    {
        $jsonData = json_decode(file_get_contents($this->filePath), true);

        $items = [];
        foreach ($jsonData as $datum) {
            foreach ($datum['prices'] as $price) {
                $items[] = (new PriceImportTransfer())
                    ->setCustomerNumber((int)$datum['customer_number'])
                    ->setItemNumber((int)$datum['item_number'])
                    ->setQuantity((int)$price['quantity'])
                    ->setValue((double)$price['value'])
                    ->toArray();
            }
        }

        $this->internalIterator = new \ArrayIterator($items);

        return true;
    }

    public function close(): bool
    {
        unset($this->internalIterator);

        return true;
    }

    public function seek(int $offset, int $whence): int
    {
        return -1;
    }

    public function eof(): bool
    {
        return !$this->internalIterator->valid();
    }
}
