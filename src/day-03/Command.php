<?php

declare(strict_types=1);

namespace AdventOfCode\Day3;

use Symfony\Component\Console\Command\Command as ConsoleCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Command extends ConsoleCommand
{
    protected function configure()
    {
        $this->setName('day:03')
            ->setDescription('Day 3: No Matter How You Slice It')
            ->addArgument('input', InputArgument::REQUIRED, 'path to input')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf('Overlaps: <info>%s</info>', NoMatterHowYouSliceIt::overlaps(file($input->getArgument('input')))));
        $output->writeln(sprintf('No overlaps: <info>%s</info>', NoMatterHowYouSliceIt::noOverlaps(file($input->getArgument('input')))));
    }
}
