<?php

namespace App\Console\Commands;

use App\Services\ImportDataService;
use Illuminate\Console\Command;

class ImportDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-data-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $importDataService;

    public function __construct(ImportDataService $importDataService)
    {
        parent::__construct();
        $this->importDataService = $importDataService;
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $this->info('Command Started...');
        $this->importDataService->initialize();
        $this->info('Command Finished...');
    }
}
