<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\StartDateOfWeek;
use App\Models\Week;
use Carbon\Carbon;

class Generation extends Model
{
    public function current_week($generation_id)
    {
        $today = new Carbon;
        $current_week_start_date = StartDateOfWeek::where('generation_id', $generation_id)->where('start_date', '<=', $today)->max('start_date');
        $current_week_id = StartDateOfWeek::where('generation_id', $generation_id)->where('start_date', $current_week_start_date)->first()->week_id;
        $current_week = Week::find($current_week_id)->week_number;
        return $current_week;
    }
}
