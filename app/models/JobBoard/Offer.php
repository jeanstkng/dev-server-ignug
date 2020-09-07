<?php

namespace App\Models\JobBoard;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\JobBoard\Company;
use App\Models\JobBoard\Professional;
use App\Models\JobBoard\Location;
use App\Models\JobBoard\Category;
use App\Models\Ignug\State;

class Offer extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $connection = 'pgsql-job-board';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'code',
        'contact',
        'email',
        'phone',
        'cell_phone',
        'contract_type',
        'position',
        'training_hours',
        'remuneration',
        'working_day',
        'number_jobs',
        'experience_time',
        'activities',
        'aditional_information',
        'start_date',
        'finish_date'

    ]; 

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function professionals()
    {
        return $this->belongsToMany(Professional)->withTimestamps();
    }

    public function city()
    {
        return $this->belongsTo(Location::class);
    }

    public function province()
    {
        return $this->belongsTo(Location::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function father_category()
    { 
        return $this->belongsTo(Category::class);
    }

    public function children_category()
    {
        return $this->belongsTo(Category::class);
    }
}
