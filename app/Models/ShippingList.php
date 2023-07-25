<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingList extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'code',
        'month',
        'type_id',
        'created_at'
    ];


    public function surveys()
    {
       return $this->belongsToMany(Survey::class, 'shipping_surveys', 'shippinglist_id', 'survey_id');
    }

    public function users()
    {
       return $this->hasOne(User::class,'id','owner_id');
    }

    public function typeInspection() {
        return $this->hasOne(TypesInspection::class, 'id', 'type_id');
    }
}
