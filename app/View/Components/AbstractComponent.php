<?php

namespace App\View\Components;

use Illuminate\View\Component;

abstract class AbstractComponent extends Component
{
    public $name;
    public $value;
    public $label;
    public $type;
    public $required;
    public $rows;
    public $class;
    public $hint;
    public $inputClass;
    public $autocomplete;
    public $optionList;

    /**
     * Create a new component instance.
     *
     * @param $name
     * @param null $label
     * @param string $type
     * @param bool $required
     * @param string $class
     * @param int $rows
     * @param null $inputClass
     * @param null $hint
     * @param null $value
     * @param null $autocomplete
     * @param array $optionList
     */
    public function __construct($name, $label = null, $type = 'text', $required = false,
                                $class = 'mb-5', $rows = 2, $inputClass = null, $hint = null,
                                $value = null, $autocomplete = null, $optionList = [])
    {
        $this->name = $name;
        $this->value = $value;
        $this->label = $label;
        $this->type = $type;
        $this->required = $required;
        $this->rows = $rows;
        $this->class = $class;
        $this->hint = $hint;
        $this->inputClass = $inputClass;
        $this->autocomplete = $autocomplete;
        $this->optionList = $optionList;
    }
}
