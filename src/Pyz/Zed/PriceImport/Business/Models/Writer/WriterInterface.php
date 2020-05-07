<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport\Business\Models\Writer;

use Generated\Shared\Transfer\PriceImportTransfer;

interface WriterInterface
{
    public function write(PriceImportTransfer $transfer): void;
}
