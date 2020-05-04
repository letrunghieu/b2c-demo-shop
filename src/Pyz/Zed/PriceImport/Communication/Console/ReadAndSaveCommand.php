<?php declare(strict_types = 1);

namespace Pyz\Zed\PriceImport\Communication\Console;

use Generated\Shared\Transfer\ExampleTransfer;
use Generated\Shared\Transfer\PriceImportTransfer;
use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReadAndSaveCommand extends Console
{
    private const COMMAND_NAME = 'example:read-and-save';
    private const IMPORT_FILE = 'example.json';

    protected function configure(): void
    {
        parent::configure();

        $this->setName(self::COMMAND_NAME)
            ->setDescription('Read the example.json file and save to db')
            ->addArgument('path', InputArgument::REQUIRED);
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $output->writeln("Reading example.json file ...");

        $path = $input->getArgument('path');
        $this->getFacade()->import($path);

        $output->writeln('Done.');
    }
}
