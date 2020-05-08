<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPriceStorage\Business\Model\Publisher;

use Generated\Shared\Transfer\CustomerPriceTransfer;
use Generated\Shared\Transfer\PyzCustomerPriceStorageEntityTransfer;
use Pyz\Zed\CustomerPriceStorage\Persistence\CustomerPriceStorageEntityManagerInterface;

class DefaultPublisher implements PublisherInterface
{
    /** @var CustomerPriceStorageEntityManagerInterface */
    private $entityManager;

    public function __construct(CustomerPriceStorageEntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function publish(CustomerPriceTransfer $customerPriceTransfer)
    {
        $this->entityManager->saveEntity($customerPriceTransfer);
    }
}
