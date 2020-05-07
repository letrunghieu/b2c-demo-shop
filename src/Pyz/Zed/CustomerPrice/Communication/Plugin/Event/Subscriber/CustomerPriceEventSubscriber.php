<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Communication\Plugin\Event\Subscriber;

use Pyz\Zed\CustomerPrice\Communication\Plugin\Event\Listener\CustomerPriceParsedEventListener;
use Pyz\Zed\CustomerPrice\CustomerPriceEvents;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

class CustomerPriceEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{
    public function getSubscribedEvents(EventCollectionInterface $eventCollection): EventCollectionInterface
    {
        $eventCollection->addListener(CustomerPriceEvents::CUSTOMER_PRICE_PARSED, new CustomerPriceParsedEventListener());

        return $eventCollection;
    }
}
