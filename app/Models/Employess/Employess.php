<?php

namespace App\Models\Employess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employess extends Model
{
    use HasFactory;

    protected $table = 'employess';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employess_id',
        'company_id',
        'positions_id',
        'first_name', //Nome
        'last_name', //Sobrenome
        'birth_date', // Data de aniversario
        'earnings', //ganhos $$
        'types_of_earnings', //tipo do ganho: mes, hora, dias, semana...(n)
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'types_of_earnings',
        'earnings'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
}
