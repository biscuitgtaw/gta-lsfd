<?php

namespace App\Http\Controllers\LSFDLive;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

class LSFDBaseController extends Controller
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
        $this->middleware('guest');
        $this->constants = \Config::get('constants');
        View::share('constants', $this->constants);
    }

    /**
     * Backend handling for the join_us page
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @access @everyone
     * @version 1.0.0
     */
    public function index()
    {
        return view('lsfd.join_us.join_us');
    }

    /**
     * Backend handling for the registration page
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @access @everyone
     * @version 1.0.0
     */
    public function registrationHandler()
    {
        return view('lsfd.join_us.register');
    }

    /**
     * Backend handling for the registration page
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @access @everyone
     * @version 1.0.0
     */
    public function admaker()
    {
        return view('lsfd.admaker');
    }

    /**
     * Backend handling for the registration page
     *
     * @param
     * @return string
     * @access @everyone
     * @author Oliver (Redbully14urh@gmail.com)
     * @version 1.0.0
     */
    public function registrationPostHandler(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
            'email' => 'nullable|unique:users',
        ]);

        $user = new User();
        $user->username = $request['username'];
        $user->name = $request['first_name'].' '.$request['last_name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();

        return 'success';
    }

    /* File location: App/Http/Controllers/Antelope.php */
    /* End of File - Antelope.php */
}
