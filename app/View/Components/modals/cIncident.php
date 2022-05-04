<?php

namespace App\View\Components\modals;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Storage;

class cIncident extends Component
{
    public $streets;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $streetsJSON = Storage::disk('local')->get('streets.json');
        $this->streets = json_decode($streetsJSON, true);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modals.create_incident');
    }
}
