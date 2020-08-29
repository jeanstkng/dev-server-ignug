<?php

namespace App\Models\JobBoard;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobBoard\Offer;

class Company extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identity',
        'nature',
        'trade_name',
        'email',
        'comercial_activity',
        'phone',
        'cell_phone',
        'web_page',
        'address',
        'state',
    ];

    public function offers()
    {
        return $this->hasMany('App\Offer');
    }

    public function professionals()
    {
        return $this->belongsToMany('App\Professional')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}