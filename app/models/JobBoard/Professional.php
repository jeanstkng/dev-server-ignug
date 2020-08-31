<?php

namespace App\Models\JobBoard;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use App\Models\JobBoard\Offer;
use App\Models\JobBoard\Company;

class Professional extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $connection = 'pgsql-job-board';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identity',
        'first_name',
        'last_name',
        'email',
        'nationality',
        'civil_state',
        'birthdate',
        'gender',
        'phone',
        'address',
        'about_me',
        'state',
    ];

    public function offers()
    {
        return $this->belongsToMany(Offer::class)->withTimestamps();
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class)->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function academicFormations()
    {
        return $this->hasMany('App\Models\JobBoard\AcademicFormation');
    }

    public function abilities()
    {
        return $this->hasMany('App\Models\JobBoard\Ability');
    }

    public function languages()
    {
        return $this->hasMany('App\Models\JobBoard\Language');
    }

    public function courses()
    {
        return $this->hasMany('App\Models\JobBoard\Course');
    }

    public function professionalExperiences()
    {
        return $this->hasMany('App\Models\JobBoard\ProfessionalExperience');
    }

    public function professionalReferences()
    {
        return $this->hasMany('App\Models\JobBoard\ProfessionalReference');
    }


}
