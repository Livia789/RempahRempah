<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public $timestamps = false;

    public function recipes() {
        return $this->hasMany(Recipe::class);
    }
}
