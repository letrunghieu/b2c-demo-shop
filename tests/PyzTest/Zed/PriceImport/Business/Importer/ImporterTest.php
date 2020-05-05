<?php declare(strict_types = 1);

namespace PyzTest\Zed\PriceImport\Business\Importer;

use Codeception\Test\Unit;
use Pyz\Zed\PriceImport\Business\Importer\Importer;
use Pyz\Zed\PriceImport\Persistence\PriceImportEntityManagerInterface;

class ImporterTest extends Unit
{
    protected $tester;
    public function testImport(): void {
        $entityManager = \Mockery::mock(PriceImportEntityManagerInterface::class);
        $entityManager->shouldReceive('persist')
            ->twice();

        $dataFile = __DIR__ .'/../../_data/import-01.json';
        $importer = new Importer($entityManager);

        $importer->import($dataFile);
    }

    protected function _after()
    {
        \Mockery::close();
        parent::_after();
    }
}
