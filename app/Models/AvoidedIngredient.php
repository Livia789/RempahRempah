<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvoidedIngredient extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'ingredient_name'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }
}
