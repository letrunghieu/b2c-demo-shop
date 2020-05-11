<?php declare(strict_types=1);

namespace Pyz\Shared\CustomerPrice\Service;

use Spryker\Service\Kernel\AbstractService;

class KeyGeneratorService extends AbstractService implements KeyGeneratorServiceInterface
{
    public function generateKey(string $customerNumber, string $itemNumber): string
    {
        return "{$customerNumber}_{$itemNumber}";
    }
}
