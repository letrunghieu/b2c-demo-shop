<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Business\Importer;

interface ImporterInterface
{
    public function import(string $path);
}
