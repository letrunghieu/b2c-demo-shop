<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Business\Model\Reader;

use Generated\Shared\Transfer\CustomerPriceTransfer;
use Generated\Shared\Transfer\CustomerPriceValueTransfer;

interface ReaderInterface
{

    /**
     * @param string $path
     * @return CustomerPriceTransfer[]
     */
    public function parseFile(string $path): array;
}
