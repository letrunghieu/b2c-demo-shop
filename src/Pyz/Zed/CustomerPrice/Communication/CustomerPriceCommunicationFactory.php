<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Communication;

use Pyz\Zed\CustomerPrice\Business\Model\Expander\CustomerPriceProductPageExpander;
use Pyz\Zed\CustomerPrice\Business\Model\Expander\CustomerPriceProductPageExpanderInterface;
use Pyz\Zed\CustomerPrice\CustomerPriceDependencyProvider;
use Spryker\Zed\Event\Business\EventFacadeInterface;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

class CustomerPriceCommunicationFactory extends AbstractCommunicationFactory
{
    public function getEventFacade(): EventFacadeInterface
    {
        return $this->getProvidedDependency(CustomerPriceDependencyProvider::EVENT_FACADE);
    }
}
