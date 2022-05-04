<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\HasRoles;
use Illuminate\Routing\Route;

class User extends Authenticatable
{
    /*
    |--------------------------------------------------------------------------
    | Antelope User Model
    |--------------------------------------------------------------------------
    |
    */

    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @var arr
     * @version 1.0.0
     */
    protected $fillable = [
        'name', 'username', 'password', 'universe'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @var arr
     * @version 1.0.0
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /* File location: App/Http/User.php */
    /* End of File - User.php */
}
