<?php

namespace App\Models;

use Laravel\Jetstream\Membership as JetstreamMembership;

class Meansurent extends JetstreamMembership
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    static $rules = [
		'user_by' => 'required',
		'name' => 'required',
		'bound_total' => 'required',
		'start_date' => 'required',
        'end_date' => 'required'
    ];

    protected $fillable = [
        'user_by',
		'name',
		'bound_total',
		'start_date',
        'end_date',
    ];


}
