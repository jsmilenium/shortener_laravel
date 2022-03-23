<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\CrawlerRepository;

class CrawlerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'curl:crawler';
    protected $repository;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawling';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CrawlerRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->repository->init();
    }
}
