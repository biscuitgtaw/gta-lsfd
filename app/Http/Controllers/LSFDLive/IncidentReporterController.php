<?php

namespace App\Http\Controllers\LSFDLive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\LSFDLive\Incident;
use Illuminate\Support\Facades\Storage;

class IncidentReporterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Antelope Main Controller
    |--------------------------------------------------------------------------
    |
    */

    public $constants;

    /**
     * Executes before running the main controllers
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return
     * @access @everyone
     * @version 1.0.0
     */
    public function __construct()
    {
        $this->constants = \Config::get('constants');
        View::share('constants', $this->constants);
    }

    /**
     * Backend handling for the main incident tracking system
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @access @everyone
     * @version 1.0.0
     */
    public function index()
    {
        $incidents = Incident::all();

        return view('lsfd.incident_reporter.control_center')->with('incidents', $incidents);
    }

    /* File location: App/Http/Controllers/Antelope.php */
    /* End of File - Antelope.php */
}
