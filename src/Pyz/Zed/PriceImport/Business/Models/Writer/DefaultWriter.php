<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Business\Models\Writer;

use Generated\Shared\Transfer\PriceImportTransfer;
use Pyz\Zed\PriceImport\Persistence\PriceImportEntityManagerInterface;

class DefaultWriter implements WriterInterface
{
    /** @var PriceImportEntityManagerInterface */
    private $entityManager;

    /**
     * DefaultWriter constructor.
     * @param PriceImportEntityManagerInterface $entityManager
     */
    public function __construct(PriceImportEntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function write(PriceImportTransfer $transfer): void
    {
        $this->entityManager->persist($transfer);
    }
}
