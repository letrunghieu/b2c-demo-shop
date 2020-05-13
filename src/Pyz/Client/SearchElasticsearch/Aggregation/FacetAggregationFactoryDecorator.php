<?php declare(strict_types=1);

namespace Pyz\Client\SearchElasticsearch\Aggregation;

use Generated\Shared\Transfer\FacetConfigTransfer;
use Pyz\Shared\SearchElasticsearch\SearchElasticsearchConfig;
use Spryker\Client\SearchElasticsearch\Aggregation\FacetAggregationFactoryInterface;
use Spryker\Client\SearchElasticsearch\Aggregation\FacetAggregationInterface;

class FacetAggregationFactoryDecorator implements FacetAggregationFactoryInterface
{

    /** @var FacetAggregationFactoryInterface */
    private $baseFactory;

    public function __construct(FacetAggregationFactoryInterface $baseFactory)
    {
        $this->baseFactory = $baseFactory;
    }

    public function create(FacetConfigTransfer $facetConfigTransfer): FacetAggregationInterface
    {
        if ($facetConfigTransfer->getType() === SearchElasticsearchConfig::FACET_TYPE_CUSTOMER_PRICES) {

            return $this->createCustomerPricesAggregation($facetConfigTransfer);
        }

        return $this->baseFactory->create($facetConfigTransfer);
    }

    private function createCustomerPricesAggregation(FacetConfigTransfer $facetConfigTransfer): FacetAggregationInterface
    {
        return new CustomerPriceAggregation();
    }
}
