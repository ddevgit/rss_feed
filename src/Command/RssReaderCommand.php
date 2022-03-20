<?php

namespace App\Command;


use App\Entity\Feed;
use App\Repository\FeedRepository;
use FeedIo\FeedIo;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

//bin/console app:rss-reader
class RssReaderCommand extends Command
{
    protected static $defaultName = 'app:rss-reader';
    private $feedIo;
    private $feedRepository;

    public function __construct(FeedIo $feedIo, FeedRepository $feedRepository)
    {
        $this->feedIo = $feedIo;
        $this->feedRepository = $feedRepository;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }


    function test2(){
        // the feed you want to read
        $url = 'https://minimalistbaker.com/feed/';

        // this date is used to fetch only the latest items
        $feedStoreTime = new Feed();
        $this->feedRepository->add($feedStoreTime);
        $lasTimeFeed = $feedStoreTime->getLastTime();

        // now fetch its (fresh) content
        $feed = $this->feedIo->read($url,null , null )->getFeed();

        foreach ( $feed as $item ) {
           echo "Title:". $item->getTitle()."\n" ;
            echo $item->getLink() ."\n" ;
        }

    }




    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->test2();

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
