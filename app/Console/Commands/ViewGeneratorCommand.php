<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class ViewGeneratorCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'make:view';

    protected $type = 'View';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin view';

    protected function getStub()
    {
        return base_path('stubs/index.stub');
    }

    protected function getNameInput()
    {
        return 'index.blade';
    }

    protected function getPath($name)
    {
        return Str::replaceFirst('app/', '', parent::getPath($name));
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\resources\\views\\admin\\' . Str::kebab($this->argument('name'));
    }
}
