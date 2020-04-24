<?php declare(strict_types = 1);

namespace Pyz\Zed\HelloSpryker\Business;

interface HelloSprykerFacadeInterface
{
    public function reverseString(string $stringToReverse): string;
}
