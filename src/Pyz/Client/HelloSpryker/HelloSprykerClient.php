<?php declare(strict_types = 1);

namespace Pyz\Client\HelloSpryker;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Pyz\Client\HelloSpryker\HelloSprykerClientInterface;
use Spryker\Client\Kernel\AbstractClient;

class HelloSprykerClient extends AbstractClient implements HelloSprykerClientInterface
{

    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        return $this->getFactory()
            ->createHelloSprykerZedStub()
            ->reverseString($helloSprykerTransfer);
    }
}
