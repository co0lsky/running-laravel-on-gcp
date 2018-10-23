<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'code',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function trackings()
    {
        return $this->hasMany('App\Tracking');
    }

    public function locations()
    {
        return $this->hasMany('App\TrackerLocation');
    }
}
