<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrackerLocation extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'lat', 'lng',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function tracker()
    {
        return $this->hasOne('App\Tracker');
    }
}
