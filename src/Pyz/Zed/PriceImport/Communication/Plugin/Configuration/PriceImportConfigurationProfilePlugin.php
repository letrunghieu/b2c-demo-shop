<?php declare(strict_types=1);

namespace Pyz\Zed\PriceImport\Communication\Plugin\Configuration;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use SprykerMiddleware\Zed\Process\Dependency\Plugin\Configuration\ConfigurationProfilePluginInterface;

class PriceImportConfigurationProfilePlugin extends AbstractPlugin implements ConfigurationProfilePluginInterface
{

    public function getProcessConfigurationPlugins(): array
    {
        return $this->getFactory()->getPriceImportProcesses();
    }

    public function getTranslatorFunctionPlugins(): array
    {
        return [];
    }

    public function getValidatorPlugins(): array
    {
        return [];
    }
}
