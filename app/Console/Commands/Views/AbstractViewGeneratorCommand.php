<?php

namespace App\Console\Commands\Views;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

abstract class AbstractViewGeneratorCommand extends GeneratorCommand
{
    protected function getPath($name)
    {
        return Str::replaceFirst('app/', '', parent::getPath($name));
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\\resources\\views\\admin\\' . Str::kebab($this->argument('name'));
    }

    protected function replaceNamespace(&$stub, $name)
    {
        $searches = [
            ['{{ model }}', '{{ modelVariable }}', '{{ modelPath }}'],
            ['{{model}}', '{{modelVariable}}', '{{modelPath}}'],
        ];

        $modelClass = class_basename($this->getNamespace($name));

        foreach ($searches as $search) {
            $stub = str_replace(
                $search,
                [ucfirst($modelClass), Str::camel($modelClass), Str::kebab($modelClass)],
                $stub
            );
        }

        return $this;
    }
}
