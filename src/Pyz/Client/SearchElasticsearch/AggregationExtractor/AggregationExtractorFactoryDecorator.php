<?php declare(strict_types=1);

namespace Pyz\Client\SearchElasticsearch\AggregationExtractor;

use Generated\Shared\Transfer\FacetConfigTransfer;
use Pyz\Shared\SearchElasticsearch\SearchElasticsearchConfig;
use Spryker\Client\SearchElasticsearch\AggregationExtractor\AggregationExtractorFactoryInterface;
use Spryker\Client\SearchElasticsearch\AggregationExtractor\AggregationExtractorInterface;
use Spryker\Client\SearchElasticsearch\Dependency\Client\SearchElasticsearchToMoneyClientInterface;

class AggregationExtractorFactoryDecorator implements AggregationExtractorFactoryInterface
{
    /** @var AggregationExtractorFactoryInterface */
    private $baseFactory;

    /** @var SearchElasticsearchToMoneyClientInterface */
    private $moneyClient;

    public function __construct(AggregationExtractorFactoryInterface $baseFactory, SearchElasticsearchToMoneyClientInterface $moneyClient)
    {
        $this->baseFactory = $baseFactory;
        $this->moneyClient = $moneyClient;
    }


    public function create(FacetConfigTransfer $facetConfigTransfer): AggregationExtractorInterface
    {
        if ($facetConfigTransfer->getType() === SearchElasticsearchConfig::FACET_TYPE_CUSTOMER_PRICES) {
            return new CustomerPriceFacetExtractor($facetConfigTransfer, $this->moneyClient);
        }

        return $this->baseFactory->create($facetConfigTransfer);
    }
}
