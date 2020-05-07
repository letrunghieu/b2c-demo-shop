<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Communication\Plugin\Event\Listener;

use Pyz\Zed\CustomerPrice\Business\CustomerPriceFacade;
use Spryker\Shared\Kernel\Transfer\TransferInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method CustomerPriceFacade getFacade()
 */
class CustomerPriceParsedEventListener extends AbstractPlugin implements EventHandlerInterface
{
    public function handle(TransferInterface $transfer, $eventName)
    {
        $this->getFacade()->saveCustomerPrice($transfer);
    }
}
