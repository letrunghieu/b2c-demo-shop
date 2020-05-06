<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Communication\Plugin\Stream;

use Pyz\Zed\PriceImport\Business\Models\Stream\PriceImportWriteStream;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerMiddleware\Shared\Process\Stream\WriteStreamInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\OutputStreamPluginInterface;

class PriceImportWriteStreamPlugin extends AbstractPlugin implements OutputStreamPluginInterface
{
    private const PLUGIN_NAME = __CLASS__;

    public function getName(): string
    {
        return self::PLUGIN_NAME;
    }

    public function getOutputStream(string $path): WriteStreamInterface
    {
        return new PriceImportWriteStream();
    }
}
