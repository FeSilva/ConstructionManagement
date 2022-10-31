<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contractor
 *
 * @property $id
 * @property $fantasy_name
 * @property $tax_id
 * @property $zipcode
 * @property $endereco
 * @property $municipio
 * @property $bairro
 * @property $phone
 * @property $email
 * @property $contact_name
 * @property $phone_opcional
 * @property $contact_name_opcional
 * @property $email_opcional
 * @property $created_by
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property InterventionProcess[] $interventionProcesses
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Contractor extends Model
{
    use SoftDeletes;

    static $rules = [
		'fantasy_name' => 'required',
		'tax_id' => 'required',
		'created_by' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fantasy_name','tax_id','zipcode','endereco','municipio','bairro','phone','email','contact_name','phone_opcional','contact_name_opcional','email_opcional','created_by'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function interventionProcesses()
    {
        return $this->hasMany('App\Models\InterventionProcess', 'contractor_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }
    

}
