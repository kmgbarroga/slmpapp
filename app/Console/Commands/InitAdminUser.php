<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class InitAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init-admin-user';

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
        $u1 = User::create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password')
        ]);

        $this->info('User for Testing:');
        $this->info("Email:".$u1->email);
        $this->info("Password: password");
    }
}
