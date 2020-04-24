<?php declare(strict_types=1);

namespace Pyz\Zed\HelloSpryker\Business\Writer;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Pyz\Zed\HelloSpryker\Persistence\HelloSprykerEntityManagerInterface;

class StringWriter implements StringWriterInterface
{
    /** @var HelloSprykerEntityManagerInterface */
    private $helloSprykerEntityManager;

    public function __construct(HelloSprykerEntityManagerInterface $helloSprykerEntityManager)
    {
        $this->helloSprykerEntityManager = $helloSprykerEntityManager;
    }


    public function createHelloSprykerEntity(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        return $this->helloSprykerEntityManager->saveHelloSprykerEntity($helloSprykerTransfer);
    }
}
