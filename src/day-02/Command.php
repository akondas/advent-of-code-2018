<?php

declare(strict_types=1);

namespace AdventOfCode\Day2;

use Symfony\Component\Console\Command\Command as ConsoleCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class Command extends ConsoleCommand
{
    protected function configure()
    {
        $this->setName('day:02')
            ->setDescription('Day 2: Inventory Management System')
            ->addArgument('input', InputArgument::REQUIRED, 'path to input')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln(sprintf('Checksum: <info>%s</info>', InventoryManagementSystem::checksum(file($input->getArgument('input')))));
        $output->writeln(sprintf('Box id: <info>%s</info>', InventoryManagementSystem::find(file($input->getArgument('input')))));
    }
}
