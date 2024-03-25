<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepHeader extends Model
{
    use HasFactory;
    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }

    public function steps(){
        return $this->hasMany(Step::class);
    }
}
