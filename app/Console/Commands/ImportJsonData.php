<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportJsonData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-json-data';
    protected array $resourcesArray = [
        'users',
        'todos',
        'photos',
        'albums',
        'comments',
        'posts'
    ];

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command fetches data from resource and inserts to local database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        
    }
}
