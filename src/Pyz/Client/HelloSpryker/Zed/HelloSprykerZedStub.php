<?php declare(strict_types = 1);

namespace Pyz\Client\HelloSpryker\Zed;


use Generated\Shared\Transfer\HelloSprykerTransfer;
use Spryker\Client\ZedRequest\ZedRequestClientInterface;

class HelloSprykerZedStub implements HelloSprykerZedStubInterface
{
    /** @var ZedRequestClientInterface */
    protected $zedRequestClient;

    public function __construct(ZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    public function reverseString(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        /** @var HelloSprykerTransfer $helloSprykerTransfer */
        $helloSprykerTransfer = $this->zedRequestClient->call(
            '/hello-spryker/gateway/reverse-string',
            $helloSprykerTransfer
        );

        return $helloSprykerTransfer;
    }
}
