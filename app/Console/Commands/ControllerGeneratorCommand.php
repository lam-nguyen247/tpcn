<?php

namespace App\Console\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand;
use Illuminate\Support\Str;

class ControllerGeneratorCommand extends ControllerMakeCommand
{
    protected function buildParentReplacements()
    {
        $parentModelClass = $this->parseModel($this->option('parent'));

        return array_merge(parent::buildParentReplacements(), [
            '{{ modelPath }}' => Str::kebab(class_basename($parentModelClass)),
            '{{modelPath}}' => Str::kebab(class_basename($parentModelClass)),
        ]);
    }

    protected function buildModelReplacements(array $replace)
    {
        $modelClass = $this->parseModel($this->option('model'));

        return array_merge(parent::buildModelReplacements($replace), [
            '{{ modelPath }}' => Str::kebab(class_basename($modelClass)),
            '{{modelPath}}' => Str::kebab(class_basename($modelClass)),
        ]);
    }
}
