<?php

namespace App\Http\Controllers\Antelope;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AntelopeSA extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Antelope Superadmin Controller
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
     * @access @SuperAdmin
     * @version 1.0.0
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:get_superadmin_tab']);
        $this->constants = \Config::get('constants');

        View::share('constants', $this->constants);
    }

    /**
     * Backend handler for the universe_settings view
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @version 1.0.0
     */
    public function universe_settings()
    {
        if(!auth()->user()->can('view_universe_settings')) {
            return abort(403);
        }
        return \Config::get('constants');
    }
    
    /* File location: App/Http/Controllers/AntelopeSA.php */
    /* End of File - AntelopeSA.php */
}
