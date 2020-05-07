<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Communication\Plugin\Event\Subscriber;

use Pyz\Zed\PriceImport\Communication\Plugin\Event\Listener\PriceParsedEventListener;
use Pyz\Zed\PriceImport\Dependency\PriceImportEvents;
use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

class PriceImportEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{

    public function getSubscribedEvents(EventCollectionInterface $eventCollection): EventCollectionInterface
    {
        $eventCollection->addListener(PriceImportEvents::PRICE_PARSED, new PriceParsedEventListener());

        return $eventCollection;
    }
}
