<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Generation;
use App\Models\Week;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function generation($generation_id)
    {
        return Generation::find($generation_id);
    }

    public function have_input_error($user_id, $week_id)
    {
        $weeks = Week::where('course_id', 1);
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
}
