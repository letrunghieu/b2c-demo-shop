<?php declare(strict_types=1);

namespace Pyz\Client\CustomerPrice;

use Generated\Shared\Transfer\CustomerPriceTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method CustomerPriceFactory getFactory()
 */
class CustomerPriceClient extends AbstractClient implements CustomerPriceClientInterface
{
    public function getPrices(string $customerNumber, string $itemNumber): CustomerPriceTransfer
    {
        return $this->getFactory()->createStorageReader()->getPrices($customerNumber, $itemNumber);
    }
}
