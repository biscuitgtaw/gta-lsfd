<?php

namespace App\Http\Controllers\Antelope;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use App\Rules\Auth\MatchOldPassword;

class AntelopeAccount extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Antelope Account Controller
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
        $this->middleware('auth');
        $this->constants = \Config::get('constants');
        View::share('constants', $this->constants);
    }

    /**
     * Backend handling for the settings system
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @access @everyone
     * @version 1.0.0
     */
    public function settings()
    {
        $user = auth()->user();

        return view('settings')->with('user', $user);
    }

    /**
     * Backend handling for editing a profile
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return string
     * @access @everyone
     * @version 1.0.0
     */
    public function editProfile(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'username' => 'required|unique:users,username,'.$user->id,
            'name' => 'required|min:3',
            'email' => 'nullable|unique:users,email,'.$user->id,
        ]);

        $user->username = $request['username'];
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        return 'success';
    }

    /**
     * Backend handling for changing a password
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return string
     * @access @everyone
     * @version 1.0.0
     */
    public function changePassword(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => 'required|string|min:8',
            'new_password_confirm' => 'same:new_password',
        ]);

        $user->password = Hash::make($request['new_password']);
        $user->save();

        return 'success';
    }


    /* File location: App/Http/Controllers/Antelope.php */
    /* End of File - Antelope.php */
}
