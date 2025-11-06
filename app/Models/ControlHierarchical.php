<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ControlHierarchical extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'control_hierarchicals';
    protected $guarded = ['id'];

    public function determiningControls()
    {
        return $this->hasMany(DeterminingControl::class, 'control_hierarchical_id');
    }
}
