<?php declare(strict_types = 1);

namespace Pyz\Zed\HelloSpryker\Business\Reader;

use Generated\Shared\Transfer\HelloSprykerTransfer;
use Pyz\Zed\HelloSpryker\Persistence\HelloSprykerRepositoryInterface;

class StringReader implements StringReaderInterface
{
    /** @var HelloSprykerRepositoryInterface */
    private $helloSprykerRepository;

    public function __construct(HelloSprykerRepositoryInterface $helloSprykerRepository)
    {
        $this->helloSprykerRepository = $helloSprykerRepository;
    }

    public function findHelloSpryker(HelloSprykerTransfer $helloSprykerTransfer): HelloSprykerTransfer
    {
        $helloSprykerTransfer = $this->helloSprykerRepository->findPyzHelloSprykerById($helloSprykerTransfer->getIdHelloSpryker());

        if (!$helloSprykerTransfer) {
            return new HelloSprykerTransfer();
        }

        return $helloSprykerTransfer;
    }
}
