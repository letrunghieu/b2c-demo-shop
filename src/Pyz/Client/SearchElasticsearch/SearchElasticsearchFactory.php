<?php declare(strict_types=1);

namespace Pyz\Client\SearchElasticsearch;

use Pyz\Client\SearchElasticsearch\Aggregation\FacetAggregationFactoryDecorator;
use Pyz\Client\SearchElasticsearch\AggregationExtractor\AggregationExtractorFactoryDecorator;
use Spryker\Client\SearchElasticsearch\Aggregation\FacetAggregationFactoryInterface;
use Spryker\Client\SearchElasticsearch\AggregationExtractor\AggregationExtractorFactoryInterface;
use Spryker\Client\SearchElasticsearch\SearchElasticsearchFactory as SprykerSearchElasticsearchFactory;

class SearchElasticsearchFactory extends SprykerSearchElasticsearchFactory
{
    public function createFacetAggregationFactory(): FacetAggregationFactoryInterface
    {
        return new FacetAggregationFactoryDecorator(parent::createFacetAggregationFactory());
    }

    public function createAggregationExtractorFactory(): AggregationExtractorFactoryInterface
    {
        return new AggregationExtractorFactoryDecorator(
            parent::createAggregationExtractorFactory(),
            $this->getMoneyClient()
        );
    }
}
