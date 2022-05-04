<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controller Imports
|--------------------------------------------------------------------------
|
*/

use App\Http\Controllers\Antelope\AntelopePublic\AntelopeAuth;
use App\Http\Controllers\Antelope\Antelope;
use App\Http\Controllers\Antelope\AntelopeDeveloper;
use App\Http\Controllers\Antelope\AntelopeSA;
use App\Http\Controllers\Antelope\AntelopeAdmin;
use App\Http\Controllers\Antelope\AntelopeAccount;
use App\Http\Controllers\LSFDLive\LSFDBaseController;
use App\Http\Controllers\LSFDLive\IncidentTrackingController;
use App\Http\Controllers\LSFDLive\IncidentReporterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/laravel', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Main Website Routes
|--------------------------------------------------------------------------
|
*/

/**
 * Webdomain: /dashboard
 *
 * @author Oliver (Redbully14urh@gmail.com)
 * @package GET
 * @category BaseRoutes
 * @access @Auth
 * @version 1.0.0
 */
Route::get('/dashboard', [Antelope::class, 'dashboard'])
    ->name('dashboard');

/**
 * Webdomain: /tos
 *
 * @author Oliver (Redbully14urh@gmail.com)
 * @package GET
 * @category BaseRoutes
 * @access @Auth
 * @version 1.0.0
 */
Route::get('/tos', [Antelope::class, 'pageTermsOfService'])
    ->name('terms_of_service');

/**
 * Webdomain: /privacy_policy
 *
 * @author Oliver (Redbully14urh@gmail.com)
 * @package GET
 * @category BaseRoutes
 * @access @Auth
 * @version 1.0.0
 */
Route::get('/privacy_policy', [Antelope::class, 'pagePrivacyPolicy'])
    ->name('privacy_policy');

/**
 * Webdomain: /about_this_project
 *
 * @author Oliver (Redbully14urh@gmail.com)
 * @package GET
 * @category BaseRoutes
 * @access @Auth
 * @version 1.0.0
 */
Route::get('/about_this_project', [Antelope::class, 'pageAboutUs'])
    ->name('about_this_project');

/**
 * Webdomain: /join_us
 *
 * @author Oliver (Redbully14urh@gmail.com)
 * @package GET
 * @category BaseRoutes
 * @access @Auth
 * @version 1.0.0
 */
Route::get('/join_us', [LSFDBaseController::class, 'index'])
    ->name('join_us');

/**
 * Webdomain: /admaker
 *
 * @author Oliver (Redbully14urh@gmail.com)
 * @package GET
 * @category BaseRoutes
 * @access @Auth
 * @version 1.0.0
 */
Route::get('/admaker', [LSFDBaseController::class, 'admaker'])
    ->name('admaker');

/**
 * Webdomain: /join_us/register
 *
 * @author Oliver (Redbully14urh@gmail.com)
 * @package GET
 * @category BaseRoutes
 * @access @Auth
 * @version 1.0.0
 */
Route::get('/join_us/register', [LSFDBaseController::class, 'registrationHandler'])
    ->name('join_us_register');

/**
 * Webdomain: /register
 *
 * @author Oliver (Redbully14urh@gmail.com)
 * @package POST
 * @category BaseRoutes
 * @access @Auth
 * @version 1.0.0
 */
Route::post('/ajax_register', [LSFDBaseController::class, 'registrationPostHandler'])
    ->name('ajax_register');

Route::get('/', function () {
    return redirect('/dashboard');
});

if (env('APP_ENV', 'production') == 'local') {
    Route::get('/developer_debug', [AntelopeDeveloper::class, 'antelopeDebug'])
        ->name('developer_debug');

    Route::get('/developer_debug/{e}', [AntelopeDeveloper::class, 'antelopeDebug'])
        ->name('developer_debug_expression');
}


Route::namespace('AntelopePublic')->group(function() {
    /*
    |--------------------------------------------------------------------------
    | Public Antelope Routes
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Webdomain: /login
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category AntelopePublic
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/login', [AntelopeAuth::class, 'showLoginForm'])
        ->name('showLoginForm');


    /**
     * Webdomain: /login
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package POST
     * @category AntelopePublic
     * @access @everyone
     * @version 1.0.0
     */
    Route::post('/login', [AntelopeAuth::class, 'login'])
        ->name('login');

    /**
     * Webdomain: /logout
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package POST
     * @category AntelopePublic
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/logout', [AntelopeAuth::class, 'logout'])
        ->name('logout');
});

Route::prefix('superadmin')->group(function() {
    /*
    |--------------------------------------------------------------------------
    | Superadmin Antelope Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/', function () {
        return redirect('/superadmin/universe_settings');
    });

    /**
     * Webdomain: /superadmin/universe_settings
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category AntelopeSA
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/universe_settings', [AntelopeSA::class, 'universe_settings'])
        ->name('superadmin_universe_settings');

});

Route::prefix('admin')->group(function() {
    /*
    |--------------------------------------------------------------------------
    | Admin Antelope Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/', function () {
        return redirect('/admin/user_management');
    });

    /**
     * Webdomain: /admin/user_management
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category AntelopeAdmin
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/user_management', [AntelopeAdmin::class, 'user_management_index'])
        ->name('admin_user_management');

    /**
     * Webdomain: /admin/user_management/table
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category AntelopeAdmin
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/user_management/table', [AntelopeAdmin::class, 'user_management_table'])
        ->name('admin_user_management_table');

    /**
     * Webdomain: /admin/rank_management
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category AntelopeAdmin
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/rank_management', [AntelopeAdmin::class, 'rank_management_index'])
        ->name('admin_rank_management');

    /**
     * Webdomain: /admin/rank_management/table
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category AntelopeAdmin
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/rank_management/table', [AntelopeAdmin::class, 'rank_management_table'])
        ->name('admin_rank_management_table');

    /**
     * Webdomain: /admin/add_user
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package POST
     * @category AntelopeAdmin
     * @access @everyone
     * @version 1.0.0
     */
    Route::post('/add_user', [AntelopeAdmin::class, 'addUser'])
        ->name('admin_add_user');

    /**
     * Webdomain: /admin/add_rank
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package POST
     * @category AntelopeAdmin
     * @access @everyone
     * @version 1.0.0
     */
    Route::post('/add_rank', [AntelopeAdmin::class, 'addRank'])
        ->name('admin_add_rank');

    /**
     * Webdomain: /admin/edit_user
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package PUT
     * @category AntelopeAdmin
     * @access @everyone
     * @version 1.0.0
     */
    Route::put('/edit_user', [AntelopeAdmin::class, 'editUser'])
        ->name('admin_edit_user');

    /**
     * Webdomain: /admin/ajax_edit_user_fetch
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category AntelopeAdmin
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/ajax_edit_user_fetch', [AntelopeAdmin::class, 'editUserFetch'])
        ->name('admin_ajax_edit_user_fetch');

    /**
     * Webdomain: /admin/edit_rank
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package PUT
     * @category AntelopeAdmin
     * @access @everyone
     * @version 1.0.0
     */
    Route::put('/edit_rank', [AntelopeAdmin::class, 'editRank'])
        ->name('admin_edit_rank');

    /**
     * Webdomain: /admin/ajax_edit_rank_fetch
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category AntelopeAdmin
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/ajax_edit_rank_fetch', [AntelopeAdmin::class, 'editRankFetch'])
        ->name('admin_ajax_edit_rank_fetch');


});

Route::prefix('settings')->group(function() {
    /*
    |--------------------------------------------------------------------------
    | Antelope Settings Routes
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Webdomain: /settings
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category BaseRoutes
     * @access @Auth
     * @version 1.0.0
     */
    Route::get('/', [AntelopeAccount::class, 'settings'])
        ->name('settings');

    /**
     * Webdomain: /settings/ajax_edit_profile
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category BaseRoutes
     * @access @Auth
     * @version 1.0.0
     */
    Route::post('/ajax_edit_profile', [AntelopeAccount::class, 'editProfile'])
        ->name('settings_ajax_edit_profile');

    /**
     * Webdomain: /settings/ajax_change_password
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category BaseRoutes
     * @access @Auth
     * @version 1.0.0
     */
    Route::post('/ajax_change_password', [AntelopeAccount::class, 'changePassword'])
        ->name('settings_ajax_change_password');

});

Route::prefix('incidents')->group(function() {
    /*
    |--------------------------------------------------------------------------
    | Incident LSFD Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/', function () {
        return redirect('/incidents/live_map');
    });

    /**
     * Webdomain: /incidents/live_map
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category /
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/live_map', [IncidentTrackingController::class, 'index'])
        ->name('incidents_live_map');

    /**
     * Webdomain: /incidents/details/{id}
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category /
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/details/{id}', [IncidentTrackingController::class, 'detailedView'])
        ->name('incidents_details');

    /**
     * Webdomain: /incidents/details/raw/{id}
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category /
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/details/raw/{id}', [IncidentTrackingController::class, 'detailedViewRaw'])
        ->name('incidents_details_raw');

    /**
     * Webdomain: /incidents/create
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package POST
     * @category /
     * @access @everyone
     * @version 1.0.0
     */
    Route::post('/create', [IncidentTrackingController::class, 'create'])
        ->name('incidents_create');

    /**
     * Webdomain: /incidents/modify/{id}
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package POST
     * @category /
     * @access @everyone
     * @version 1.0.0
     */
    Route::post('/modify/{id}', [IncidentTrackingController::class, 'modify'])
        ->name('incidents_modify');

    /**
     * Webdomain: /incidents/ajax_recent_incidents_fetch
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category /
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/ajax_recent_incidents_fetch', [IncidentTrackingController::class, 'incidentHistoryFetch'])
        ->name('incidents_ajax_recent_incident_fetch');

    /**
     * Webdomain: /incidents/ajax_map_markers_fetch
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category /
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/ajax_map_markers_fetch', [IncidentTrackingController::class, 'mapMarkersFetch'])
        ->name('incidents_ajax_map_markers_fetch');
});

Route::prefix('incident_reporter')->group(function() {
    /*
    |--------------------------------------------------------------------------
    | Incident Reporter LSFD Routes
    |--------------------------------------------------------------------------
    |
    */

    Route::get('/', function () {
        return redirect('/incident_reporter/control_center');
    });

    /**
     * Webdomain: /incident_reporter/control_center
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @package GET
     * @category /
     * @access @everyone
     * @version 1.0.0
     */
    Route::get('/control_center', [IncidentReporterController::class, 'index'])
        ->name('ir_control_center');
});



/* File location: routes/web.php */
/* End of File - web.php */
