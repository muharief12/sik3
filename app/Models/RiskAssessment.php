<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RiskAssessment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'risk_assessments';
    protected $guarded = ['id'];

    public function hazardIdentification()
    {
        return $this->belongsTo(HazardIdentification::class, 'hazard_identification_id', 'id');
    }
}
