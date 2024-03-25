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

    public function admin(){
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function ahli_gizi(){
        return $this->belongsTo(User::class, 'ahli_gizi_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function sub_category_1(){
        return $this->belongsTo(Category::class, 'sub_category_1_id');
    }

    public function sub_category_2(){
        return $this->belongsTo(Category::class, 'sub_category_2_id');
    }

    public function isPublic(){
        return $this->ahli_gizi_id !== null;
    }

    public function reviews(){
        return $this->hasMany(Review::class);
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

    public function nutrition(){
        return $this->belongsToMany(Nutrition::class)->withPivot('quantity', 'unit');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
