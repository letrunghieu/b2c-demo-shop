<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Business\Model\Writer;

use Generated\Shared\Transfer\CustomerPriceTransfer;
use Pyz\Zed\CustomerPrice\Persistence\CustomerPriceEntityManagerInterface;
use Pyz\Zed\CustomerPrice\Persistence\CustomerPriceRepositoryInterface;

class DefaultWriter implements WriterInterface
{
    /** @var CustomerPriceRepositoryInterface */
    private $repository;

    /** @var CustomerPriceEntityManagerInterface */
    private $entityManager;

    /**
     * DefaultWriter constructor.
     * @param CustomerPriceRepositoryInterface $repository
     * @param CustomerPriceEntityManagerInterface $entityManager
     */
    public function __construct(CustomerPriceRepositoryInterface $repository, CustomerPriceEntityManagerInterface $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    public function write(CustomerPriceTransfer $customerPriceTransfer): void {
        foreach($customerPriceTransfer->getValues() as $valueTransfer) {
            $entityTransfer = $this->repository->findOrCreateCustomerPriceEntitiesByCustomerItemAndQuantity(
                $customerPriceTransfer->getCustomerNumber(),
                $customerPriceTransfer->getItemNumber(),
                $valueTransfer->getQuantity()
            );

            $entityTransfer->setPrice($valueTransfer->getPrice());

            $this->entityManager->saveCustomerPrice($entityTransfer);
        }
    }
}
