<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reflection;
use App\Models\StudyTime;
use App\Models\StartDateOfWeek;
use Carbon\Carbon;

class Week extends Model
{
    protected $guarded = [];

    public function teaching_materials()
    {
        return $this->hasMany('App\Models\Assignment')->where('assignment_type_id', 1);
    }

    public function posse_assignments()
    {
        return $this->hasMany('App\Models\Assignment')->where('assignment_type_id', 2);
    }

    public function personality_reflection($user_id, $week_id, $reflection_step)
    {
        $personality_reflection = Reflection::where('user_id', $user_id)->where('week_id', $week_id)->where('reflection_step', $reflection_step)->where('reflection_type_id', 1)->first();
        if ($personality_reflection) {
            return $personality_reflection->detail;
        }
        return '';
    }

    public function learning_reflection($user_id, $week_id, $reflection_step)
    {
        $learning_reflection = Reflection::where('user_id', $user_id)->where('week_id', $week_id)->where('reflection_step', $reflection_step)->where('reflection_type_id', 2)->first();
        if ($learning_reflection) {
            return $learning_reflection->detail;
        }
        return '';
    }

    public function total_study_time($user_id, $week_id)
    {
        $review_time = StudyTime::where('user_id', $user_id)->where('week_id', $week_id)->where('study_time_type_id', 1)->first();
        $assignment_time = StudyTime::where('user_id', $user_id)->where('week_id', $week_id)->where('study_time_type_id', 2)->first();
        if ($review_time && $assignment_time) {
            return $review_time->study_time + $assignment_time->study_time;
        }
        if ($review_time) {
            return $review_time->study_time;
        }
        if ($assignment_time) {
            return $assignment_time->study_time;
        }
        return 0;
    }

    public function review_time($user_id, $week_id)
    {
        $review_time = StudyTime::where('user_id', $user_id)->where('week_id', $week_id)->where('study_time_type_id', 1)->first();
        if ($review_time) {
            return $review_time->study_time;
        }
        return 0;
    }

    public function assignment_time($user_id, $week_id)
    {
        $assignment_time = StudyTime::where('user_id', $user_id)->where('week_id', $week_id)->where('study_time_type_id', 2)->first();
        if ($assignment_time) {
            return $assignment_time->study_time;
        }
        return 0;
    }

    public function was_not_inputted_study_time($user_id, $week_id)
    {
        $week = StartDateOfWeek::where('week_id', $week_id)->first();
        if ($week) {
            $dt = new Carbon;
            if ($week->start_date > $dt) {
                return false;
            }
            $review_time = StudyTime::where('user_id', $user_id)->where('week_id', $week_id)->where('study_time_type_id', 1)->first();
            $assignment_time = StudyTime::where('user_id', $user_id)->where('week_id', $week_id)->where('study_time_type_id', 2)->first();
            if ($review_time || $assignment_time) {
                return false;
            }
            return true;
        }
        return false;
    }

    public function start_date_of_week($week_id, $generation_id)
    {
        $start_date_of_week_table = StartDateOfWeek::where('week_id', $week_id)->where('generation_id', $generation_id)->first();
        if ($start_date_of_week_table) {
            return $start_date_of_week_table->start_date;
        }
        return 'まだ設定されていません';
    }

    public function start_date_of_weeks()
    {
        return $this->hasMany('App\Models\StartDateOfWeek');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
}
