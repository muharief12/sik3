<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkStation extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'work_stations';
    protected $guarded = ['id'];

    public function activityLists()
    {
        return $this->hasMany(ActivityList::class, 'work_station_id');
    }
}
