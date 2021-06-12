<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FreshInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reinstall an application.';

    /**
     * Execute the console command.
     * Argument r: reboot
     *
     * @return void
     */
    public function handle()
    {
        $this->call('migrate:fresh', ['--seed' => true]);
        $this->call('cache:clear');
        $this->info('Successful reinstalled');
    }
}
