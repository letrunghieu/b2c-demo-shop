<?php declare(strict_types = 1);

namespace Pyz\Zed\HelloSpryker\Business;

use Pyz\Zed\HelloSpryker\Business\Reader\StringReader;
use Pyz\Zed\HelloSpryker\Business\Reader\StringReaderInterface;
use Pyz\Zed\HelloSpryker\Business\Reverser\StringReverser;
use Pyz\Zed\HelloSpryker\Business\Reverser\StringReverserInterface;
use Pyz\Zed\HelloSpryker\Business\Writer\StringWriter;
use Pyz\Zed\HelloSpryker\Business\Writer\StringWriterInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \Pyz\Zed\HelloSpryker\Persistence\HelloSprykerEntityManagerInterface getEntityManager()
 * @method \Pyz\Zed\HelloSpryker\Persistence\HelloSprykerRepositoryInterface getRepository()
 */
class HelloSprykerBusinessFactory extends AbstractBusinessFactory
{
    public function createStringReverser(): StringReverserInterface
    {
        return new StringReverser();
    }

    public function createStringReader(): StringReaderInterface
    {
        return new StringReader($this->getRepository());
    }

    public function createStringWriter(): StringWriterInterface
    {
        return new StringWriter($this->getEntityManager());
    }
}
