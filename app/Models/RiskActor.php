<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiskActor extends Model
{
    use HasFactory;
    protected $table = 'risk_actors';
    protected $guarded = ['id'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function hazardidentification(): BelongsTo
    {
        return $this->belongsTo(HazardIdentification::class, 'hazard_identification_id', 'id');
    }
}
