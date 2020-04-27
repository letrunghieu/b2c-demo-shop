<?php declare(strict_types = 1);

namespace Pyz\Client\PersonalizedProduct;

interface PersonalizedProductClientInterface
{
    public function getPersonalizedProducts(int $limit): array;
}
