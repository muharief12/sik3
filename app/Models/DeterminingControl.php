<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DeterminingControl extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'determining_controls';
    protected $guarded = ['id'];

    public function riskAssessment()
    {
        return $this->belongsTo(RiskAssessment::class, 'risk_assessment_id', 'id');
    }

    public function controlHierarchical()
    {
        return $this->belongsTo(ControlHierarchical::class, 'control_hierarchical_id', 'id');
    }
}
