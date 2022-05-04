<?php

namespace App\Http\Controllers\Antelope;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;

class AntelopeDeveloper extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Antelope Developer Controller
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Executes before running the main controllers
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return
     * @access @APP_ENV LOCAL
     * @version 1.0.0
     */
    public function __construct()
    {
        //$this->middleware('auth'); -- haha auth goes brrrrtttt

        // just putting this here in case I forget to delete this file
        if (env('APP_ENV', 'production') != 'local') {
            return redirect(403);
        }
    }


    /**
     * I'll litterally do whatever I want in this file and nobody can judge me.
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @version 1.0.0
     */
    public function antelopeDebug2($e = null)
    {
        $password = Hash::make('password');

        if ($e == 'plain') {
            dd($password);
        }

        return view('debug')->with('password', $password);
    }

    /**
     * I'll litterally do whatever I want in this file and nobody can judge me.
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @version 1.0.0
     */
    public function antelopeDebug($e = null)
    {

        if ($e != 'create_ranks') {
            abort(403);
        }

        auth()->user()->syncRoles('superadmin');

        dd('done');

    }


    /* File location: App/Http/Controllers/AntelopeDeveloper.php */
    /* End of File - AntelopeDeveloper.php */
}
