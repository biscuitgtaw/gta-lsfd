<?php /** @noinspection ALL */

namespace App\Http\Controllers\Antelope;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Datatables;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AntelopeAdmin extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Antelope Admin Controller
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
     * @access @Admin
     * @version 1.0.0
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:get_admin_tab']);
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
    public function user_management_index()
    {
        if(!auth()->user()->can('view_user_management')) {
            return abort(403);
        }
        return view('admin.user_management');
    }

    /**
     * Backend handler for loading the datatable
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return Datatables
     * @version 1.0.0
     */
    public function user_management_table()
    {
        if(!auth()->user()->can('view_user_management')) {
            return abort(403);
        }
        $query = User::query()->select([
            'id AS id',
            'username AS username',
            'name AS name',
            'email AS email'
        ]);

        return datatables($query)
            ->addColumn('rank', function($query) {
                return $query->getRankName();
            })
            ->toJson();
    }

    /**
     * Backend handler for the universe_settings view
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return \Illuminate\Contracts\Support\Renderable
     * @version 1.0.0
     */
    public function rank_management_index()
    {
        if(!auth()->user()->can('view_rank_management')) {
            return abort(403);
        }
        return view('admin.rank_management');
    }

    /**
     * Backend handler for loading the datatable
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param
     * @return Datatables
     * @version 1.0.0
     */
    public function rank_management_table()
    {
        if(!auth()->user()->can('view_rank_management')) {
            return abort(403);
        }
        $query = Role::query()
            ->select([
                'id AS id',
                'name AS name',
                'guard_name AS guard_name',
                'display_name AS display_name'
            ]);

        return datatables($query)
            ->addColumn('permissions', function($query) {
                return $query->getPermissionNames()->implode(', ');
            })
            ->toJson();
    }

    /**
     * Backend handling for creating a user
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param Request $request
     * @return
     * @version 1.0.0
     */
    public function addUser(Request $request)
    {
        if(!auth()->user()->can('create_user')) {
            return abort(403);
        }
        $this->validate($request, [
            'username' => 'required|unique:users',
            'name' => 'required|min:3',
            'password' => 'required|min:8',
            'email' => 'nullable|unique:users',
            'rank' => 'nullable|integer|exists:roles,id'
        ]);

        $user = new User();
        $user->username = $request['username'];
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->syncRoles($request['rank']);
        $user->save();
    }

    /**
     * Backend handling for fetching a user's data
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     * @version 1.0.0
     */
    public function editUserFetch(Request $request)
    {
        if(!auth()->user()->can('edit_user')) {
            return view('components.auth.lack_perms');
        }
        $user = User::find($request['id']);

        return view('ajax.edit_user_fetch', ['user' => $user]);
    }

    /**
     * Backend handling for editing a user
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param Request $request
     * @return
     * @version 1.0.0
     */
    public function editUser(Request $request)
    {
        if(!auth()->user()->can('edit_user')) {
            return abort(403);
        }
        $user = User::find($request['id']);

        $this->validate($request, [
            'username' => 'required|unique:users,username,'.$user->id,
            'name' => 'required|min:3',
            'email' => 'nullable|unique:users,email,'.$user->id,
            'rank' => 'nullable|integer|exists:roles,id',
        ]);

        $user->username = $request['username'];
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->syncRoles($request['rank']);
        $user->save();
    }

    /**
     * Backend handling for creating a rank
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param Request $request
     * @return
     * @version 1.0.0
     */
    public function addRank(Request $request)
    {
        if(!auth()->user()->can('create_rank')) {
            return abort(403);
        }
        $this->validate($request, [
            'name' => 'required|string|unique:roles',
            'display_name' => 'required',
            'permissions.*' => 'nullable|integer|exists:permissions,id'
        ]);

        $rank = new Role();
        $rank->name = $request['name'];
        $rank->guard_name = 'web';
        $rank->display_name = $request['display_name'];
        $rank = $rank->save();

        Role::findByName($request['name'])->givePermissionTo($request['permissions']);
    }

    /**
     * Backend handling for fetching a rank's data
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     * @version 1.0.0
     */
    public function editRankFetch(Request $request)
    {
        if(!auth()->user()->can('edit_rank')) {
            return view('components.auth.lack_perms');
        }
        $role = Role::find($request['id']);

        return view('ajax.edit_rank_fetch', ['role' => $role]);
    }

    /**
     * Backend handling for editing a rank
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @param Request $request
     * @return
     * @version 1.0.0
     */
    public function editRank(Request $request)
    {
        if(!auth()->user()->can('edit_rank')) {
            return abort(403);
        }
        $role = Role::find($request['id']);

        $this->validate($request, [
            'name' => 'required|string|unique:roles,name,'.$role->id,
            'display_name' => 'required',
            'permissions.*' => 'nullable|integer|exists:permissions,id'
        ]);

        $role->name = $request['name'];
        $role->guard_name = 'web';
        $role->display_name = $request['display_name'];
        $role->syncPermissions($request['permissions']);
        $role->save();
    }

    /* File location: App/Http/Controllers/AntelopeAdmin.php */
    /* End of File - AntelopeAdmin.php */
}
