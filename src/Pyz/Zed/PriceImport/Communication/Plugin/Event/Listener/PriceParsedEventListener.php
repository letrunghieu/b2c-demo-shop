<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Communication\Plugin\Event\Listener;

use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

class PriceParsedEventListener extends AbstractPlugin implements EventHandlerInterface
{

    public function handle(TransferInterface $transfer, $eventName)
    {
        $this->getFacade()->handlePriceParsedEvent($transfer);
    }
}
