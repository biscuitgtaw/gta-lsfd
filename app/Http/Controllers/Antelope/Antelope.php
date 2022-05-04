<?php

namespace App\Http\Controllers\Antelope;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Antelope extends Controller
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
     * Backend handling for the main dashboard system
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @access @everyone
     * @version 1.0.0
     */
    public function dashboard()
    {
        return view('dashboard')->with('constants', $this->constants);
    }

    /**
     * Backend handling for the privacy policy
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @access @everyone
     * @version 1.0.0
     */
    public function pagePrivacyPolicy()
    {
        return view('privacy_policy');
    }

    /**
     * Backend handling for the tos
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @access @everyone
     * @version 1.0.0
     */
    public function pageTermsOfService()
    {
        return view('terms_of_service');
    }

    /**
     * Backend handling for the about_us page
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @access @everyone
     * @version 1.0.0
     */
    public function pageAboutUs()
    {
        return view('about_this_project');
    }

    /* File location: App/Http/Controllers/Antelope.php */
    /* End of File - Antelope.php */
}
