<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyItemProgress extends Model
{
    use HasFactory;

    protected $table = "SurveyItemProgress";
    protected $fillable = [
        'id',
        'intervention_id',
        'item_id',
        'surveys_id',
        'date_survey',
        'progress',
        'created_at',
        'updated_at'
    ];
}
