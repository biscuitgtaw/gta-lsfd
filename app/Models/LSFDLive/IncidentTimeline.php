<?php

namespace App\Models\LSFDLive;

use Illuminate\Database\Eloquent\Model;

class IncidentTimeline extends Model
{
    /*
    |--------------------------------------------------------------------------
    | LSFD.Live Incident Timeline Model
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
        'incident_id', 'title', 'description', 'reporter_id', 'displayed_at', 'visible', 'type'
    ];

    public function incident() {
        return $this->belongsTo(Incident::class, 'incident_id', 'id');
    }


    /* File location: App/Http/User.php */
    /* End of File - User.php */
}
