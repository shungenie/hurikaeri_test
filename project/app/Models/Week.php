<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    public function teaching_materials()
    {
        return $this->hasMany('App\Models\TeachingMaterial', 'week', 'week_number');
    }
}
