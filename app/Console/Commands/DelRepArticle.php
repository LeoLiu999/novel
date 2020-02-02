<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Service\ArticleService;

class DelRepArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:article';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete repeat article';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ArticleService $articleService)
    {
        //
        $articleService->deleteRepeat();
    }
}
