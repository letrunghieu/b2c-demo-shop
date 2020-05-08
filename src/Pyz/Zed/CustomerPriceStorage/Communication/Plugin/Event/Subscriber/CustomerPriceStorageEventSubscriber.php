<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPriceStorage\Communication\Plugin\Event\Subscriber;

use Pyz\Zed\CustomerPrice\CustomerPriceEvents;
use Pyz\Zed\CustomerPriceStorage\Communication\Plugin\Event\Listener\CustomerPriceStorageListener;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

class CustomerPriceStorageEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{
    public function getSubscribedEvents(EventCollectionInterface $eventCollection): EventCollectionInterface
    {
        $eventCollection->addListener(
            CustomerPriceEvents::CUSTOMER_PRICE_SAVED,
            new CustomerPriceStorageListener()
        );

        return $eventCollection;
    }
}
