<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport\Persistence;

use Generated\Shared\Transfer\PriceImportTransfer;

interface PriceImportEntityManagerInterface
{
    public function persist(PriceImportTransfer $priceImportTransfer): void ;
}
