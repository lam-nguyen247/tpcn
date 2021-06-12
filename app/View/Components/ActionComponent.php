<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ActionComponent extends Component
{
    public $route;
    public $id;
    public $disabledEdit;
    public $disabledDelete;

    /**
     * Create a new component instance.
     *
     * @param $route
     * @param $id
     * @param bool $disabledEdit
     * @param bool $disabledDelete
     */
    public function __construct($route, $id, $disabledEdit = false, $disabledDelete = false)
    {
        $this->route = $route;
        $this->id = $id;
        $this->disabledEdit = $disabledEdit;
        $this->disabledDelete = $disabledDelete;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('admin.components.action');
    }
}
