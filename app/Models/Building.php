<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Building
 *
 * @property $id
 * @property $user_id
 * @property $codigo
 * @property $name
 * @property $endereco
 * @property $diretoria
 * @property $municipio
 * @property $bairro
 * @property $telefone
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Building extends Model
{
    protected $table = "building";
    static $rules = [
		'user_id' => 'required',
		'codigo' => 'required',
		'name' => 'required',
		'endereco' => 'required',
		'diretoria' => 'required',
		'municipio' => 'required',
		'bairro' => 'required',
		'telefone' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','codigo','name','endereco','diretoria','municipio','bairro','telefone'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    

}
