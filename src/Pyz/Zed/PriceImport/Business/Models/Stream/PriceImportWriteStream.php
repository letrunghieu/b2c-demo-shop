<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Business\Models\Stream;

use SprykerMiddleware\Shared\Process\Stream\WriteStreamInterface;
use SprykerMiddleware\Zed\Process\Business\Exception\MethodNotSupportedException;

class PriceImportWriteStream implements WriteStreamInterface
{
    private $data;

    public function open(): bool
    {
        $this->data = [];

        return true;
    }

    public function close(): bool
    {
        return true;
    }

    public function seek(int $offset, int $whence): int
    {
        throw new MethodNotSupportedException();
    }

    public function eof(): bool
    {
        throw new MethodNotSupportedException();
    }

    public function write(array $data): int
    {
        $this->data[] = $data;

        return 1;
    }

    public function flush(): bool
    {
        var_dump($this->data);

        return true;
    }
}
