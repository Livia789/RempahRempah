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

    public function sub_category($index){
        return $this->belongsTo(Category::class, 'sub_category_'.$index.'_id');
    }

    public function isPublic(){
        return $this->admin_id !== null && $this->ahli_gizi_id !== null;
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

    function getDurationStr(){
        $durationMinute = $this->duration;
        $totaldays = floor($durationMinute / (24 * 60));
        $totalhour = floor(($durationMinute % (24 * 60)) / 60);
        $totalMinute = $durationMinute % 60;

        $durationStr = "";
        if ($totaldays > 0) $durationStr .= $totaldays." hari ";
        if ($totalhour > 0) $durationStr .= $totalhour." jam ";
        if ($totalMinute > 0) $durationStr .= $totalMinute." menit";
        return $durationStr;
    }
}
