<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProgressOfAssignment;

class Assignment extends Model
{
    public function is_done($user_id, $assignment_id)
    {
        $inputted_record = ProgressOfAssignment::where('user_id', $user_id)->where('assignment_id', $assignment_id)->first();
        if ($inputted_record) {
            return $inputted_record->is_done;
        }
        return false;
    }
}
