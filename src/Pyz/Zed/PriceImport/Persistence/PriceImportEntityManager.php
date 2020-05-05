<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport\Persistence;

use Generated\Shared\Transfer\PriceImportTransfer;
use Orm\Zed\PriceImport\Persistence\PyzPriceImport;
use Orm\Zed\PriceImport\Persistence\PyzPriceImportQuery;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

class PriceImportEntityManager extends AbstractEntityManager implements PriceImportEntityManagerInterface
{
    public function persist(PriceImportTransfer $priceImportTransfer): void
    {
        $pyzPriceImport = PyzPriceImportQuery::create()
            ->filterByCustomerNumber($priceImportTransfer->getCustomerNumber())
            ->filterByItemNumber($priceImportTransfer->getItemNumber())
            ->filterByQuantity($priceImportTransfer->getQuantity())
            ->findOneOrCreate();

        $pyzPriceImport->setPrice($priceImportTransfer->getValue());

        $pyzPriceImport->save();
    }
}
