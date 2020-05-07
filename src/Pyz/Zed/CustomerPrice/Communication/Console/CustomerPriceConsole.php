<?php declare(strict_types=1);

namespace Pyz\Zed\CustomerPrice\Communication\Console;

use Pyz\Zed\CustomerPrice\Communication\CustomerPriceCommunicationFactory;
use Pyz\Zed\CustomerPrice\CustomerPriceEvents;
use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\CustomerPrice\Business\CustomerPriceFacade getFacade()
 * @method CustomerPriceCommunicationFactory getFactory()
 */
class CustomerPriceConsole extends Console
{
    private const COMMAND_NAME = 'customer-price:import';
    private const DESCRIPTION = 'Import customer price from JSON file.';
    private const ARG_PATH = 'path';

    /**
     * @return void
     */
    protected function configure()
    {
        $this->setName(static::COMMAND_NAME)
            ->setDescription(static::DESCRIPTION)
            ->addArgument(self::ARG_PATH, InputArgument::REQUIRED, 'The path to the JSON file');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $messenger = $this->getMessenger();

        $path = $input->getArgument(self::ARG_PATH);

        $messenger->info(sprintf(
            'Import customer price from [%s]!',
            $path
        ));

        $customerPriceTransfers = $this->getFacade()->parseFile($path);
        $this->notify($customerPriceTransfers);

        return static::CODE_SUCCESS;
    }

    private function notify(array $customerPriceTransfers): void
    {
        $eventFacade = $this->getFactory()->getEventFacade();

        $eventFacade->triggerBulk(CustomerPriceEvents::CUSTOMER_PRICE_PARSED, $customerPriceTransfers);
    }

}
