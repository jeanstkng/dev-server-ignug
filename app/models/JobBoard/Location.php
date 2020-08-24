<?php

namespace App\Models\JobBoard;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Location extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $connection = 'pgsql-job-board';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
    ];

}
