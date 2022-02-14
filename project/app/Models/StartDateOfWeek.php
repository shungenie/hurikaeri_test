<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Generation;

class StartDateOfWeek extends Model
{
    protected $guarded = [];

    public function generation($generation_id)
    {
        return Generation::find($generation_id);
    }
}
