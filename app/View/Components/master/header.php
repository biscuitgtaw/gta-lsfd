<?php

namespace App\View\Components\master;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class header extends Component
{
    public $constants;
    public $title;
    public $breadcrumb;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $breadcrumb = null)
    {
        $this->constants = \Config::get('constants');
        $this->title = $title;

        $this->breadcrumb = explode("&amp;gt;", $breadcrumb); // every time there's a '>'
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.master.header');
    }
}
