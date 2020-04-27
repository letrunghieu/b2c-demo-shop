<?php declare(strict_types = 1);

namespace Pyz\Client\PersonalizedProduct;

use Pyz\Client\PersonalizedProduct\Plugin\Elasticsearch\Query\PersonalizedProductQueryPlugin;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Search\SearchClientInterface;

class PersonalizedProductFactory extends AbstractFactory
{
    public function createPersonalizedProductsQueryPlugin(int $limit)
    {
        return new PersonalizedProductQueryPlugin($limit);
    }

    public function getSearchQueryFormatters(): array
    {
        return $this->getProvidedDependency(PersonalizedProductDependencyProvider::CATALOG_SEARCH_RESULT_FORMATTER_PLUGINS);
    }

    public function getSearchClient(): SearchClientInterface
    {
        return $this->getProvidedDependency(PersonalizedProductDependencyProvider::CLIENT_SEARCH);
    }
}
