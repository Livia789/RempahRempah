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

    public function company(){
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function isPublished(){
        return $this->is_verified_by_admin && $this->is_verified_by_ahli_gizi && $this->rejectionReason == null && $this->type != 'private';
    }

    public function isPublicButNotPublished(){
        return $this->type != 'private' && (!$this->is_verified_by_admin || !$this->is_verified_by_ahli_gizi);
    }

    public function reviews($filter = ''){
        $reviews = $this->hasMany(Review::class);
        if($filter == 'dateAsc') return $reviews->orderBy('created_at', 'asc');
        if($filter == 'dateDesc') return $reviews->orderBy('created_at', 'desc');
        if($filter == 'ratingAsc') return $reviews->orderBy('rating', 'asc');
        if($filter == 'ratingDesc') return $reviews->orderBy('rating', 'desc');
        return $reviews;
    }

    public function stepHeaders(){
        return $this->hasMany(StepHeader::class);
    }

    public function totalSteps(){
        return $this->stepHeaders->sum(function ($stepHeader) {
            return $stepHeader->steps->count();
        });
    }

    public function totalIngredients(){
        return $this->ingredientHeaders->sum(function ($ingredientHeader) {
            return $ingredientHeader->ingredients->count();
        });
    }

    public function totalTools(){
        return $this->tools->count();
    }

    public function ingredientHeaders(){
        return $this->hasMany(IngredientHeader::class);
    }

    public function tools(){
        return $this->belongsToMany(Tool::class);
    }

    public function nutrition(){
        return $this->belongsToMany(Nutrition::class)->withPivot('quantity', 'unit', 'akgPercentage');
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
