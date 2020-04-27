<?php declare(strict_types=1);

namespace Pyz\Client\PersonalizedProduct;

use Spryker\Client\Kernel\AbstractClient;

class PersonalizedProductClient extends AbstractClient implements PersonalizedProductClientInterface
{

    public function getPersonalizedProducts(int $limit): array
    {
        $searchQuery = $this
            ->getFactory()
            ->createPersonalizedProductsQueryPlugin($limit);

        $searchQueryFromatters = $this
            ->getFactory()
            ->getSearchQueryFormatters();

        $searchResult = $this->getFactory()
            ->getSearchClient()
            ->search(
                $searchQuery,
                $searchQueryFromatters
            );

        return $searchResult;
    }
}
