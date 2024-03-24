<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    public function creator(){
        return $this->belongsTo(User::class, 'user_id');
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

    public function ahli_gizi(){
        return $this->belongsTo(User::class, 'ahli_gizi_id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function isPublic(){
        return $this->ahli_gizi_id !== null && $this->ahli_gizi_id !== null;
    }

    public function stepHeaders(){
        return $this->hasMany(StepHeader::class);
    }

    public function ingredientHeaders(){
        return $this->hasMany(IngredientHeader::class);
    }

    public function tools(){
        return $this->belongsToMany(Tool::class);
    }
}
