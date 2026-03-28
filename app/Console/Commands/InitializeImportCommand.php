<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ImportDataService;

class InitializeImportCommand extends Command
{
    // public function __construct(private ImportDataService $importDataService)
    // {
    //     parent::__construct();
    // }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:initialize-import-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Import Started...');
        // $this->importDataService->initialize();
        $this->info('Import Completed...')
    }
}
