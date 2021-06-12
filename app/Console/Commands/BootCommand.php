<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BootCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:boot {--restart}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize or restart an application.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $restart = $this->option('restart');
        if (!$restart) {
            $this->info('Running...');
            $this->call('queue:work');
        } else {
            $this->call('queue:restart');
            $this->info('Successful restarted.');
        }
    }
}
