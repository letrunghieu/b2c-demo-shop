<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPriceStorage\Communication\Plugin\Event\Listener;

use Pyz\Zed\CustomerPriceStorage\Business\CustomerPriceStorageFacadeInterface;
use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventBulkHandlerInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method CustomerPriceStorageFacadeInterface getFacade()
 */
class CustomerPriceStorageListener extends AbstractPlugin implements EventHandlerInterface, EventBulkHandlerInterface
{
    public function handleBulk(array $transfers, $eventName)
    {
//       $this->getFacade()->publish($transfer);
    }

    public function handle(TransferInterface $transfer, $eventName)
    {
        $this->getFacade()->publish($transfer);
    }
}
