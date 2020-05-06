<?php declare(strict_types = 1);

namespace Pyz\Zed\Process;

use Pyz\Zed\PriceImport\Communication\Plugin\Configuration\PriceImportConfigurationProfilePlugin;
use SprykerMiddleware\Zed\Process\ProcessDependencyProvider as SprykerProcessDependencyProvider;

class ProcessDependencyProvider extends SprykerProcessDependencyProvider
{
    protected function getConfigurationProfilePluginsStack(): array
    {
        $profileStack = parent::getConfigurationProfilePluginsStack();

        $profileStack[] = new PriceImportConfigurationProfilePlugin();

        return $profileStack;
    }
}
