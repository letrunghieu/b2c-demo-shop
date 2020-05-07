<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Business;

use Pyz\Zed\CustomerPrice\Business\Model\Reader\JsonReader;
use Pyz\Zed\CustomerPrice\Business\Model\Reader\ReaderInterface;
use Pyz\Zed\CustomerPrice\Business\Model\Writer\DefaultWriter;
use Pyz\Zed\CustomerPrice\Business\Model\Writer\WriterInterface;
use Pyz\Zed\CustomerPrice\Persistence\CustomerPriceEntityManagerInterface;
use Pyz\Zed\CustomerPrice\Persistence\CustomerPriceRepositoryInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\CustomerPrice\CustomerPriceConfig getConfig()
 * @method CustomerPriceRepositoryInterface getRepository()
 * @method CustomerPriceEntityManagerInterface getEntityManager()
 */
class CustomerPriceBusinessFactory extends AbstractBusinessFactory
{
    public function createReader(): ReaderInterface
    {
        return new JsonReader();
    }

    public function createWriter(): WriterInterface
    {
        return new DefaultWriter(
            $this->getRepository(),
            $this->getEntityManager()
        );
    }
}
