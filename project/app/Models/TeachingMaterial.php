<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProgressOfTeachingMaterial;

class TeachingMaterial extends Model
{
    public function is_done($user_id, $teaching_material_id)
    {
        $inputted_record = ProgressOfTeachingMaterial::where('user_id', $user_id)->where('teaching_material_id', $teaching_material_id)->first();
        if ($inputted_record) {
            return $inputted_record->is_done;
        }
        return false;
    }
}
