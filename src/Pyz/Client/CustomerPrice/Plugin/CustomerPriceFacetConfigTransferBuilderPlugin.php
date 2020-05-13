<?php declare(strict_types=1);

namespace Pyz\Client\CustomerPrice\Plugin;

use Generated\Shared\Search\PageIndexMap;
use Generated\Shared\Transfer\FacetConfigTransfer;
use Pyz\Shared\SearchElasticsearch\SearchElasticsearchConfig;
use Spryker\Client\Catalog\Dependency\Plugin\FacetConfigTransferBuilderPluginInterface;
use Spryker\Client\Kernel\AbstractPlugin;

class CustomerPriceFacetConfigTransferBuilderPlugin extends AbstractPlugin implements FacetConfigTransferBuilderPluginInterface
{

    public function build()
    {
        return (new FacetConfigTransfer())
            ->setName('customer-prices')
            ->setParameterName('customer-prices')
            ->setFieldName(PageIndexMap::CUSTOMER_PRICES)
            ->setType(SearchElasticsearchConfig::FACET_TYPE_CUSTOMER_PRICES);
    }
}
