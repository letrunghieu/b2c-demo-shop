<?php

namespace Pyz\Zed\Installer\Business\Icecat\Importer\Product;

use Generated\Shared\Transfer\StockProductTransfer;
use Generated\Shared\Transfer\TypeTransfer;
use Orm\Zed\Stock\Persistence\Base\SpyStockQuery;
use Pyz\Zed\Installer\Business\Exception\InvalidDataException;
use Pyz\Zed\Installer\Business\Icecat\AbstractIcecatImporter;
use Pyz\Zed\Stock\Business\StockFacadeInterface;
use Spryker\Zed\Product\Persistence\ProductQueryContainerInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProductStockImporter extends AbstractIcecatImporter
{
    const SKU = 'sku';
    const QUANTITY = 'quantity';
    const NEVER_OUT_OF_STOCK = 'is_never_out_of_stock';
    const STOCK_TYPE = 'stock_type';

    const PRODUCT_ID = 'product_id';
    const VARIANT_ID = 'variantId';
    const CATEGORY_KEY = 'category_key';

    /**
     * @var \Pyz\Zed\Stock\Business\StockFacadeInterface
     */
    protected $stockFacade;

    /**
     * @var \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected $productQueryContainer;

    /**
     * @var array
     */
    protected $stockTypeCache = [];

    /**
     * @var \SplFileObject
     */
    protected $stockCsvFile;

    /**
     * @var array
     */
    protected $stockColumns;

    /**
     * @var int
     */
    protected $stockTotal;

    /**
     * @param \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface $productQueryContainer
     */
    public function setProductQueryContainer(ProductQueryContainerInterface $productQueryContainer)
    {
        $this->productQueryContainer = $productQueryContainer;
    }

    /**
     * @param \Pyz\Zed\Stock\Business\StockFacadeInterface $stockFacade
     */
    public function setStockFacade(StockFacadeInterface $stockFacade)
    {
        $this->stockFacade = $stockFacade;
    }

    /**
     * @return bool
     */
    public function isImported()
    {
        $query = SpyStockQuery::create();
        return $query->count() > 0;
    }

    /**
     * @param array $columns
     * @param array $data
     *
     * @throws InvalidDataException
     * @return void
     */
    public function importOne(array $columns, array $data)
    {
        $csvData = $this->generateCsvItem($columns, $data);
        $product = $this->format($csvData);
        $stock = $this->getStockValue();

        $productAbstract = $this->productQueryContainer
            ->queryProductAbstractBySku($product[self::SKU])
            ->findOne();

        if (!$productAbstract) {
            return;
        }

        if ($productAbstract->getSku() !== $stock[self::SKU]) {
            throw new InvalidDataException('Abstract SKU mismatch for ' . $stock[self::SKU]);
        }

        $stockType = $this->createStockTypeOnce($stock);
        $stockProductTransfer = $this->createStockProductTransfer($stock, $stockType);
        $this->stockFacade->createStockProduct($stockProductTransfer);
    }

    /**
     * @return void
     */
    protected function before()
    {
        $this->stockCsvFile = $this->csvReader->read('stocks.csv');
        $this->stockColumns = $this->csvReader->getColumns();
        $this->stockTotal = $this->csvReader->getTotal($this->stockCsvFile);

        $this->stockCsvFile->rewind();
    }

    /**
     * @return array
     */
    protected function getStockValue()
    {
        $default = [
            self::SKU => null,
            self::VARIANT_ID => 1,
            self::QUANTITY => 0,
            self::NEVER_OUT_OF_STOCK => true,
            self::STOCK_TYPE => null
        ];

        if ($this->stockCsvFile->eof()) {
            return $default;
        }

        $data = $this->stockCsvFile->fgetcsv();

        return array_combine(array_keys($default), array_values($data));
    }

    /**
     * @param string|int $variant
     *
     * @return bool
     */
    protected function hasVariants($variant)
    {
        return intval($variant) > 1;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function format(array $data)
    {
        return $data;
    }

    /**
     * @param array $stockData
     *
     * @return \Generated\Shared\Transfer\TypeTransfer
     */
    protected function createStockTypeOnce(array $stockData)
    {
        $stockTypeTransfer = $this->createTypeTransfer($stockData);
        if (!array_key_exists($stockData[self::STOCK_TYPE], $this->stockTypeCache)) {
            $idStockType = $this->stockFacade->createStockType($stockTypeTransfer);
            $stockTypeTransfer->setIdStock($idStockType);
            $this->stockTypeCache[$stockData[self::STOCK_TYPE]] = $stockTypeTransfer;
        } else {
            $stockTypeTransfer = $this->stockTypeCache[$stockData[self::STOCK_TYPE]];
        }

        return $stockTypeTransfer;
    }

    /**
     * @param array $stockTypeData
     *
     * @return \Generated\Shared\Transfer\TypeTransfer
     */
    protected function createTypeTransfer(array $stockTypeData)
    {
        $stockType = new TypeTransfer();
        $stockType->setName($stockTypeData[self::STOCK_TYPE]);

        return $stockType;
    }

    /**
     * @param array $stockData
     * @param \Generated\Shared\Transfer\TypeTransfer $stockType
     *
     * @return \Generated\Shared\Transfer\StockProductTransfer
     */
    protected function createStockProductTransfer(array $stockData, TypeTransfer $stockType)
    {
        $transferStockProduct = new StockProductTransfer();
        $transferStockProduct->setSku($stockData[self::SKU])
            ->setIsNeverOutOfStock($stockData[self::NEVER_OUT_OF_STOCK])
            ->setQuantity($stockData[self::QUANTITY])
            ->setStockType($stockType->getName());

        return $transferStockProduct;
    }
}
