<?php

namespace App\View\Components\master;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class sidebar extends Component
{
    public $constants;
    public $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->constants = \Config::get('constants');
        $this->route = Route::currentRouteName();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.master.sidebar');
    }
}
