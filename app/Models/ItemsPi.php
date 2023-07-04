<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsPi extends Model
{
    use HasFactory;

    protected $table = "items";

    protected $fillable = ['id','intervention_id','num_item','tipo_item','date_signature_ois','date_open','prazo','price','description','created_at','updated_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function SurveyItemProgress()
    {
        return $this->hasOne('App\Models\SurveyItemProgress', 'item_id', 'id')->latest();
    }
    
}
