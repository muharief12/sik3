<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityList extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'activity_lists';
    protected $guarded = ['id'];

    public function workStation()
    {
        return $this->belongsTo(WorkStation::class, 'work_station_id', 'id');
    }

    public function hazardIdentifications()
    {
        return $this->hasMany(HazardIdentification::class, 'activity_list_id');
    }
}
