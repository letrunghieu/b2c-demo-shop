<?php declare(strict_types = 1);

namespace Pyz\Zed\StringReverser\Business;

interface StringReverserFacadeInterface
{
    public function reverseString(string $originalString): string;
}
