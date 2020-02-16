<?php 

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Util\DiscountPriceManager;

class UpdateDiscountedPriceCommand extends Command
{
   private $discountPriceManager;
   
   public function __construct(DiscountPriceManager $discountPriceManager)
   {
       parent::__construct();
        $this->discountPriceManager = $discountPriceManager;
   }
   
    protected static $defaultName = 'app:update-discounted-price-products';

    protected function configure()
    {
        $this->setDescription('Updates all products discounted prices');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write('Products discounted prices updater');
        $this->discountPriceManager->setDiscountPrices();       
        $output->write('Done');
        return 0;
    }
}