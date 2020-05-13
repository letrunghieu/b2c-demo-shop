<?php declare(strict_types=1);

namespace Pyz\Client\SearchElasticsearch\AggregationExtractor;

use Spryker\Client\SearchElasticsearch\AggregationExtractor\AggregationExtractorInterface;
use Spryker\Client\SearchElasticsearch\AggregationExtractor\PriceRangeExtractor;

class CustomerPriceFacetExtractor extends PriceRangeExtractor implements AggregationExtractorInterface
{
    protected function extractRangeData(array $aggregation)
    {
        return [(int) $aggregation['min'], (int) $aggregation['max']];
    }
}
