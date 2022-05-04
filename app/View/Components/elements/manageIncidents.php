<?php

namespace App\View\Components\elements;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Storage;

class manageIncidents extends Component
{
    public $streets;
    public $incidents;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($incidents)
    {
        $streetsJSON = Storage::disk('local')->get('streets.json');
        $this->streets = json_decode($streetsJSON, true);
        $this->incidents = $incidents;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.elements.incident_manager');
    }
}
