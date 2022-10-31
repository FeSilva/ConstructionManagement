<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Survey
 *
 * @property $id
 * @property $intervention_id
 * @property $type_id
 * @property $subtype_id
 * @property $progress_id
 * @property $owner_id
 * @property $rhythms_id
 * @property $program
 * @property $intervention_code
 * @property $building_code
 * @property $date_close
 * @property $inspection_date
 * @property $budget_number
 * @property $archive
 * @property $name_archive
 * @property $employess
 * @property $status
 * @property $physical_progress
 * @property $merge
 * @property $created_at
 * @property $updated_at
 *
 * @property InterventionProcess $interventionProcess
 * @property ProtocolSurvey[] $protocolSurveys
 * @property Rhythm $rhythm
 * @property SurveysProgress $surveysProgress
 * @property TypesInspection $typesInspection
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Survey extends Model
{
    
    static $rules = [
		'type_id' => 'required',
		'inspection_date' => 'required',
		'status' => 'required',
		'merge' => 'required',
    ];

    protected $perPage = 10;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['intervention_id','type_id','subtype_id','progress_id','owner_id','rhythms_id','program','intervention_code','building_code','date_close','inspection_date','budget_number','archive','name_archive','employess','status','physical_progress','merge'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function interventionProcess()
    {
        return $this->hasOne('App\Models\InterventionProcess', 'id', 'intervention_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function protocolSurveys()
    {
        return $this->hasMany('App\Models\ProtocolSurvey', 'survey_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rhythm()
    {
        return $this->hasOne('App\Models\Rhythms', 'id', 'rhythms_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function progress()
    {
        return $this->hasOne('App\Models\SurveysProgress', 'id', 'progress_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function typesInspection()
    {
        return $this->hasOne('App\Models\TypesInspection', 'id', 'type_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'owner_id');
    }
    

}
