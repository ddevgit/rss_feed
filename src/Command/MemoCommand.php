<?php

namespace App\Command;

use App\Services\MemoService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpClient\HttpClient;

//bin/console app:memo-test [param(0,1,2,..)]
class MemoCommand extends Command
{
    private $memoService;
    protected static $defaultName = 'app:memo-test';

    public function __construct(MemoService $memoService)
    {
        $this->$memoService = $memoService;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    public function createMemo( MemoService $memoService)
    {
        $memoService->createMemo();
    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        switch ($arg1) {
            case 0:
                $io->note(sprintf('You passed an argument: %s', $arg1));
                $this->createMemo();
                break;
            case 1:
                $io->note(sprintf('You passed an argument: %s', $arg1));
                break;
            case 2:
                $io->note(sprintf('You passed an argument: %s', $arg1));
                break;
        }


        $io->success('You have a new MEMO command!');

        return Command::SUCCESS;
    }
}
