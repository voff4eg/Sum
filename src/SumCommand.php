<?php

namespace Egorov;

use FFormula\Sum;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SumCommand extends Command
{
    /** @var int */
    private $firstArgument;

    /** @var int */
    private $secondArgument;

    public function configure(): void
    {
        $this->setName('sum')
            ->setDescription('This command shows numbers for you')
            ->addArgument('first_argument', InputArgument::REQUIRED, 'First number')
            ->addArgument('second_argument', InputArgument::REQUIRED, 'Second number');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function initialize(InputInterface $input, OutputInterface $output): void
    {
        parent::initialize($input, $output);

        $this->firstArgument = (int)$input->getArgument('first_argument');
        $this->secondArgument = (int)$input->getArgument('second_argument');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sum = new Sum();
        $result = $sum->sum($this->firstArgument, $this->secondArgument);

        $output->writeln($result);
    }
}
