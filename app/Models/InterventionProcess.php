<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InterventionProcess
 *
 * @property $id
 * @property $contractor_id
 * @property $building_id
 * @property $user_id
 * @property $code
 * @property $programa
 * @property $type_of_work
 * @property $rv
 * @property $type_of_contract
 * @property $company_name
 * @property $number_contract
 * @property $contractors_name
 * @property $number_os
 * @property $social_management_number
 * @property $description
 * @property $total_price
 * @property $discount
 * @property $total_term
 * @property $pi_object
 * @property $count_surveys
 * @property $signature_date
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Building $building
 * @property Contractor $contractor
 * @property Survey[] $surveys
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InterventionProcess extends Model
{
    use SoftDeletes;
    protected $table = "intervention_process";
    static $rules = [
		'contractor_id' => 'required',
		'building_id' => 'required',
		'user_id' => 'required',
		'code' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['contractor_id','building_id','user_id','code','programa','type_of_work','rv','type_of_contract','company_name','number_contract','contractors_name','number_os','social_management_number','description','total_price','discount','total_term','pi_object','count_surveys','signature_date'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function building()
    {
        return $this->hasOne('App\Models\Building', 'id', 'building_id');
    }

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function Items()
    {
        return $this->hasMany('App\Models\ItemsPi', 'intervention_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function contractor()
    {
        return $this->hasOne('App\Models\Contractor', 'id', 'contractor_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function surveys()
    {
        return $this->hasMany('App\Models\Survey', 'intervention_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
