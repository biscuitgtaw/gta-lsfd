<?php

namespace App\Models\LSFDLive;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    /*
    |--------------------------------------------------------------------------
    | LSFD.Live Incident Model
    |--------------------------------------------------------------------------
    |
    */

    /**
     * The attributes that are mass assignable.
     *
     * @author Oliver (Redbully14urh@gmail.com)
     * @var arr
     * @version 1.0.0
     */
    protected $fillable = [
        'reporter', 'report', 'severeness', 'type', 'title', 'description', 'responding_units', 'coordinates', 'status', 'archived'
    ];

    public function timeline() {
        return $this->hasMany(IncidentTimeline::class, 'incident_id', 'id');
    }


    /* File location: App/Http/User.php */
    /* End of File - User.php */
}
