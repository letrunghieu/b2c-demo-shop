<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport\Business;

use Pyz\Zed\PriceImport\Business\Importer\Importer;
use Pyz\Zed\PriceImport\Business\Importer\ImporterInterface;
use Pyz\Zed\PriceImport\Business\Models\Reader\JsonReader;
use Pyz\Zed\PriceImport\Business\Models\Writer\DefaultWriter;
use Pyz\Zed\PriceImport\Business\Models\Writer\WriterInterface;
use Pyz\Zed\PriceImport\Persistence\PriceImportEntityManagerInterface;
use Pyz\Zed\PriceImport\PriceImportDependencyProvider;
use Spryker\Zed\Event\Business\EventFacadeInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method PriceImportEntityManagerInterface getEntityManager()
 */
class PriceImportBusinessFactory extends AbstractBusinessFactory
{
    public function createImporter(): ImporterInterface
    {
        return new Importer($this->getEventFacade(), new JsonReader());
    }

    public function createWriter(): WriterInterface
    {
        return new DefaultWriter($this->getEntityManager());
    }

    private function getEventFacade(): EventFacadeInterface
    {
        return $this->getProvidedDependency(PriceImportDependencyProvider::EVENT_FACADE);
    }
}
