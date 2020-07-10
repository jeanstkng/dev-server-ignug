<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
        'state',
    ];

    public function users()
    {
        return $this->hasOne('App\Role');
    }


}
