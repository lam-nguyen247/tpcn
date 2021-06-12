<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install {--prod}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install an application.';

    /**
     * Execute the console command.
     * Argument r: reboot
     *
     * @return void
     */
    public function handle()
    {
        if (!file_exists('.env')) {
            if ($this->option('prod')) {
                copy('.env.production', '.env');
            } else {
                copy('.env.local', '.env');
            }
        }
        $this->call('migrate', ['--seed' => true]);
        $this->info('Successful installed');
    }
}
