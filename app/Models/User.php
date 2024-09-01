<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'lastLog' => 'datetime',
    ];
    
    public function avoidedIngredients(){
        return $this->hasMany(AvoidedIngredient::class);
    }

    public function recipes(){
        return $this->hasMany(Recipe::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }

    public function reviewReactions(){
        return $this->belongsToMany(Review::class, 'review_reactions')->withPivot(['type']);
    }

    public function allStepProgress(){
        return $this->hasMany(StepProgress::class);
    }

    public function recipeStepProgress($recipe_id){
        return $this->allStepProgress()->where('recipe_id', $recipe_id)->get();
    }

    public function allIngredientProgress(){
        return $this->hasMany(UserIngredientProgress::class);
    }

    public function recipeIngredientProgress($recipe_id){
        return $this->allIngredientProgress()->where('recipe_id', $recipe_id)->get();
    }

    public function allToolProgress(){
        return $this->hasMany(UserToolProgress::class);
    }

    public function recipeToolProgress($recipe_id){
        return $this->allToolProgress()->where('recipe_id', $recipe_id)->get();
    }

    public function cookingProgressRecipes(){
        $recipesWithStepProgress = $this->allStepProgress()->pluck('recipe_id');
        $recipesWithIngredientProgress = $this->allIngredientProgress()->pluck('recipe_id');
        $recipesWithToolProgress = $this->allToolProgress()->pluck('recipe_id');

        $recipeProgress = $recipesWithStepProgress->merge($recipesWithIngredientProgress)->merge($recipesWithToolProgress)->unique();

        return Recipe::whereIn('id', $recipeProgress)->get();
    }

    public function followers(){
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }

    public function followings(){
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }

    public function cookingHistoryRecipes(){
        return $this->belongsToMany(Recipe::class, 'cooking_histories')->withPivot(['created_at'])->orderByDesc('cooking_histories.created_at')->get();
    }

    public function totalNutritionAdded($user_id){
        $ahli_gizi = User::find($user_id);
        $recipes = Recipe::where('ahli_gizi_id', $ahli_gizi->id)->where('is_verified_by_ahli_gizi', true)->get();
        return $recipes->count();
    }

    public function totalNutritionToBeAdded($user_id){
        $ahli_gizi = User::find($user_id);
        $recipes = Recipe::where('ahli_gizi_id', $ahli_gizi->id)->where('is_verified_by_ahli_gizi', false)->where('is_verified_by_admin', true)->get();
        return $recipes->count();    
    }
}
