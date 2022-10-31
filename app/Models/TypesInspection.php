<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypesInspection
 *
 * @property $id
 * @property $name
 * @property $sigla
 * @property $description
 * @property $status
 * @property $price
 * @property $amount_to_receive
 * @property $created_at
 * @property $updated_at
 *
 * @property Protocol[] $protocols
 * @property Survey[] $surveys
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypesInspection extends Model
{
    
    static $rules = [
		'name' => 'required',
		'sigla' => 'required',
		'description' => 'required',
		'status' => 'required',
		'price' => 'required',
		'amount_to_receive' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','sigla','description','status','price','amount_to_receive'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function protocols()
    {
        return $this->hasMany('App\Models\Protocol', 'type_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function surveys()
    {
        return $this->hasMany('App\Models\Survey', 'type_id', 'id');
    }
    

}
