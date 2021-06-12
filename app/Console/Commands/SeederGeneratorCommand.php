<?php

namespace App\Console\Commands;

use Illuminate\Database\Console\Seeds\SeederMakeCommand;

class SeederGeneratorCommand extends SeederMakeCommand
{
    protected function replaceNamespace(&$stub, $name)
    {
        $searches = [
            ['{{ namespacedModel }}', '{{ model }}'],
            ['{{namespacedModel}}', '{{model}}'],
        ];

        $model = str_replace('Seeder', '', $name);
        $namespacedModel = $this->qualifyModel($model);
        foreach ($searches as $search) {
            $stub = str_replace($search, [$namespacedModel, $model], $stub);
        }

        return $this;
    }
}
