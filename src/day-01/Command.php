<?php

declare(strict_types=1);

namespace AdventOfCode\Day1;

use Symfony\Component\Console\Command\Command as ConsoleCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Command extends ConsoleCommand
{
    protected function configure()
    {
        $this->setName('day:01')
            ->setDescription('Day 1: Chronal Calibration')
            ->addArgument('input', InputArgument::REQUIRED, 'path to input')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf('Frequency: <info>%s</info>', ChronalCalibration::frequency(file($input->getArgument('input')))));
        $output->writeln(sprintf('Frequency twice: <info>%s</info>', ChronalCalibration::frequencyTwice(file($input->getArgument('input')))));
    }
}
