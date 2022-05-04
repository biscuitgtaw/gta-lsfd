<?php

namespace App\Http\Controllers\LSFDLive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\LSFDLive\Incident;
use Illuminate\Support\Facades\Storage;

class IncidentTrackingController extends Controller
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
        return view('lsfd.incident_tracking.live_map');
    }

    /**
     * Backend handling for creating an incident
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return string
     * @access @everyone
     * @version 1.0.0
     */
    public function create(Request $request)
    {
        $this->middleware('auth');
        if(!auth()->user()->hasPermissionTo('create_incident')) {
            return abort(403);
        }

        $this->validate($request, [
            'title' => 'required|string|min:3',
            'description' => 'required|min:3',
            'coordinates' => 'required|min:3',
            'report' => 'required|integer',
            'type' => 'required|integer',
            'severeness' => 'required|integer',
            'status' => 'required|integer',
            'responding_units' => 'required|string|min:3'
        ]);

        $incident = new Incident();
        $incident->reporter_id = auth()->user()->id;
        $incident->title = $request['title'];
        $incident->description = $request['description'];
        $incident->coordinates = $request['coordinates'];
        $incident->report = $request['report'];
        $incident->type = $request['type'];
        $incident->severeness = $request['severeness'];
        $incident->status = $request['status'];
        $incident->responding_units = $request['responding_units'];
        $incident->save();

        return 'success';
    }

    /**
     * Backend handling for modifying an incident
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return string
     * @access @everyone
     * @version 1.0.0
     */
    public function modify($id, Request $request)
    {
        $this->middleware('auth');
        if(!auth()->user()->hasPermissionTo('edit_incident')) {
            return abort(403);
        }

        $this->validate($request, [
            'title' => 'required|string|min:3',
            'description' => 'required|min:3',
            'coordinates' => 'required|min:3',
            'report' => 'required|integer',
            'type' => 'required|integer',
            'severeness' => 'required|integer',
            'status' => 'required|integer',
            'responding_units' => 'required|string|min:3'
        ]);

        $incident = Incident::where('id', $id)->first();
        $incident->reporter_id = auth()->user()->id; // TODO: add handling as to how the fuck we're gonna change this in case multiple people edit the same incident
        $incident->title = $request['title'];
        $incident->description = $request['description'];
        $incident->coordinates = $request['coordinates'];
        $incident->report = $request['report'];
        $incident->type = $request['type'];
        $incident->severeness = $request['severeness'];
        $incident->status = $request['status'];
        $incident->responding_units = $request['responding_units'];
        $incident->save();

        return 'success';
    }

    /**
     * Backend handling for fetching the incident history
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @access @everyone
     * @version 1.0.0
     */
    public function incidentHistoryFetch()
    {
        $incidents = Incident::all();

        return view('ajax.recent_incidents_fetch')->with('incidents', $incidents);
    }

    /**
     * Backend handling for fetching the map markers
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return array
     * @access @everyone
     * @version 1.0.0
     */
    public function mapMarkersFetch()
    {
        $markers = Incident::all();

        return $markers->toArray();
    }

    /**
     * Backend handling for fetching details for incidents
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @access @everyone
     * @version 1.0.0
     */
    public function detailedView($id)
    {
        $incident = Incident::where('id', $id)->first();

        return view('lsfd.incident_tracking.incident_details')->with('incident', $incident);
    }

    /**
     * Backend handling for fetching details for incidents (raw format)
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @access @everyone
     * @version 1.0.0
     */
    public function detailedViewRaw($id)
    {
        $incident = Incident::where('id', $id)->first();

        return $incident;
    }

    /* File location: App/Http/Controllers/Antelope.php */
    /* End of File - Antelope.php */
}
