<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Communication\Plugin\Stream;

use Pyz\Zed\PriceImport\Business\Models\Stream\PriceImportJsonReadStream;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerMiddleware\Shared\Process\Stream\ReadStreamInterface;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Stream\InputStreamPluginInterface;

class PriceImportStreamPlugin extends AbstractPlugin implements InputStreamPluginInterface
{
    private const PLUGIN_NAME = __CLASS__;

    public function getName(): string
    {
        return self::PLUGIN_NAME;
    }

    public function getInputStream(string $path): ReadStreamInterface
    {
        return new PriceImportJsonReadStream($path);
    }
}
