<?php

namespace Egorov;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use FFormula\Sum;

class SumCommand extends Command
{
    public function configure()
    {
        $this->setName('sum')
             ->setDescription('This command shows numbers for you')
             ->addArgument('a', InputArgument::REQUIRED, 'First number')
             ->addArgument('b', InputArgument::REQUIRED, 'Second number');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $a = $input->getArgument('a');
        $b = $input->getArgument('b');
        $s = new Sum();
        $res = $s->sum($a, $b);
        $output->writeln($res);
    }
}

