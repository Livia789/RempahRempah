<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialOccasion extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function recipes(){
        return $this->hasMany(Recipe::class);
    }
}
