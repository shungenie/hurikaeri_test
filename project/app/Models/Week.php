<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PersonalityReflection;

class Week extends Model
{
    protected $guarded = [];

    public function teaching_materials()
    {
        return $this->hasMany('App\Models\TeachingMaterial', 'week', 'week_number');
    }

    public function personality_reflection($user_id, $week_number, $reflection_step)
    {
        $personality_reflection = PersonalityReflection::where('user_id', $user_id)->where('week', $week_number)->where('reflection_step', $reflection_step)->first();
        if ($personality_reflection) {
            return $personality_reflection->detail;
        }
        return '';
    }
}
