<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Business;

use Generated\Shared\Transfer\PriceImportTransfer;

interface PriceImportFacadeInterface
{
    public function import(string $path): void;

    public function handlePriceParsedEvent(PriceImportTransfer $transfer): void;
}
