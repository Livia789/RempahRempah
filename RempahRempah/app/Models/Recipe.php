<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function specialOccasion(){
        return $this->belongsTo(SpecialOccasion::class);
    }

    public function daerah(){
        return $this->belongsTo(Daerah::class);
    }

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }
}
