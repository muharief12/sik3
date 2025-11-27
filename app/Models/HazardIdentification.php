<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HazardIdentification extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'hazard_identifications';
    protected $guarded = ['id'];

    public function activityList()
    {
        return $this->belongsTo(ActivityList::class, 'activity_list_id');
    }

    public function riskAssessments()
    {
        return $this->hasMany(RiskAssessment::class, 'hazard_identification_id');
    }

    public function riskActors()
    {
        return $this->hasMany(RiskActor::class, 'hazard_identification_id', 'id',);
    }
}
