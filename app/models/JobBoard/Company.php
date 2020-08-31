<?php

namespace App\Models\JobBoard;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\JobBoard\Offer;

class Company extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    protected $connection = 'pgsql-job-board';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'trade_name',
        'comercial_activity',
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\JobBoard\Catalogue');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\Ignug\State');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
