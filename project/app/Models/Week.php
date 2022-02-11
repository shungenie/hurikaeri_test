<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reflection;

class Week extends Model
{
    protected $guarded = [];

    public function teaching_materials()
    {
        return $this->hasMany('App\Models\Assignment', 'week', 'week_number')->where('assignment_type_id', 1);
    }

    public function posse_assignments()
    {
        return $this->hasMany('App\Models\Assignment', 'week', 'week_number')->where('assignment_type_id', 2);
    }

    public function personality_reflection($user_id, $week_number, $reflection_step)
    {
        $personality_reflection = Reflection::where('user_id', $user_id)->where('week', $week_number)->where('reflection_step', $reflection_step)->where('reflection_type_id', 1)->first();
        if ($personality_reflection) {
            return $personality_reflection->detail;
        }
        return '';
    }

    public function learning_reflection($user_id, $week_number, $reflection_step)
    {
        $learning_reflection = Reflection::where('user_id', $user_id)->where('week', $week_number)->where('reflection_step', $reflection_step)->where('reflection_type_id', 2)->first();
        if ($learning_reflection) {
            return $learning_reflection->detail;
        }
        return '';
    }
}
