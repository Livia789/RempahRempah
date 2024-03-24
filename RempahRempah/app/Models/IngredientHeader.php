<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientHeader extends Model
{
    use HasFactory;

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class)->withPivot('quantity', 'unit');
    }
}
