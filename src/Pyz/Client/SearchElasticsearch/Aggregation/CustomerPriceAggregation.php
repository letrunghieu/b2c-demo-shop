<?php declare(strict_types=1);

namespace Pyz\Client\SearchElasticsearch\Aggregation;

use Elastica\Aggregation\AbstractAggregation;
use Elastica\Aggregation\Stats;
use Elastica\Script\Script;
use Generated\Shared\Search\PageIndexMap;
use Spryker\Client\SearchElasticsearch\Aggregation\FacetAggregationInterface;

class CustomerPriceAggregation implements FacetAggregationInterface
{
    public function createAggregation(): AbstractAggregation
    {
        $custom = new Stats(PageIndexMap::CUSTOMER_PRICES);
        $custom->setScript(new Script(
//                str_replace("\n", '',
                "
            def customerPrice = 0; def defaultPrice = params._source['search-result-data'].price;
            if (params._source.containsKey('customer-prices') ) {
                for(priceItem in params._source['customer-prices']) {
                    if (priceItem['customer-number'] == params.customerNumber) {
                        customerPrice = priceItem['price'];
                        break;
                    }
                }
            }

            if (customerPrice > 0) {
               return customerPrice;
            } else {
               return defaultPrice;
            }
            "
                ,
//                ),
                [
                    'customerNumber' => $this->getCustomerNumber()
                ],
                'painless'
            )
        );

        return $custom;
    }

    private function getCustomerNumber(): string
    {
        return '22';
    }
}
