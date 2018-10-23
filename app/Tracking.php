<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tracking_tracker_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function tracker()
    {
        return $this->hasOne('App\Tracker', 'id', 'tracking_tracker_id');
    }

    public function locations()
    {
        return $this->hasMany('App\TrackerLocation', 'tracker_id', 'tracking_tracker_id');
    }

    public function lastLocation()
    {
        return $this->locations()->orderBy('id', 'desc')->first();
    }
}
