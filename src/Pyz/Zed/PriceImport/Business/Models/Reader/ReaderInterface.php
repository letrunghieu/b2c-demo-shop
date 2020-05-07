<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Business\Models\Reader;

use Generated\Shared\Transfer\PriceImportTransfer;

interface ReaderInterface
{
    /**
     * @param string $path
     * @return PriceImportTransfer[]
     */
    public function parseFile(string $path): array;
}
