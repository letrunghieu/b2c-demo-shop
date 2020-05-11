<?php declare(strict_types=1);

namespace Pyz\Shared\CustomerPrice\Service;

interface KeyGeneratorServiceInterface
{

    public function generateKey(string $customerNumber, string $itemNumber): string;
}
