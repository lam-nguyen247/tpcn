<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ObserverMakeCommand;

class ObserverGeneratorCommand extends ObserverMakeCommand
{
    protected function getStub()
    {
        $stub = $this->option('model')
            ? '/stubs/observer.stub'
            : '/stubs/observer.plain.stub';

        return base_path($stub);
    }
}
