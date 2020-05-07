<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport\Business\Importer;

use Generated\Shared\Transfer\PriceImportTransfer;
use Pyz\Zed\PriceImport\Business\Models\Reader\ReaderInterface;
use Pyz\Zed\PriceImport\Dependency\PriceImportEvents;
use Pyz\Zed\PriceImport\Persistence\PriceImportEntityManagerInterface;
use Spryker\Zed\Event\Business\EventFacadeInterface;

class Importer implements ImporterInterface
{
    /** @var EventFacadeInterface */
    private $eventFacade;

    /** @var ReaderInterface */
    private $reader;

    /**
     * Importer constructor.
     * @param EventFacadeInterface $eventFacade
     * @param ReaderInterface $reader
     */
    public function __construct(EventFacadeInterface $eventFacade, ReaderInterface $reader)
    {
        $this->eventFacade = $eventFacade;
        $this->reader = $reader;
    }

    public function import(string $path): void
    {
        $transfers = $this->reader->parseFile($path);

        foreach ($transfers as $transfer) {
            $this->notify($transfer);
        }
    }

    private function notify(PriceImportTransfer $transfer): void
    {
        $this->eventFacade->trigger(PriceImportEvents::PRICE_PARSED, $transfer);
    }
}
