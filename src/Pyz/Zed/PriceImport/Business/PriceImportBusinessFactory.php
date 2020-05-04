<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport\Business;

use Pyz\Zed\PriceImport\Business\Importer\Importer;
use Pyz\Zed\PriceImport\Business\Importer\ImporterInterface;
use Pyz\Zed\PriceImport\Persistence\PriceImportEntityManagerInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method PriceImportEntityManagerInterface getEntityManager()
 */
class PriceImportBusinessFactory extends AbstractBusinessFactory
{
    public function createImporter(): ImporterInterface
    {
        return new Importer($this->getEntityManager());
    }
}
