<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function stepProgress(){
        return $this->belongsToMany(User::class, 'step_progress')->where('user_id', auth()->id());
    }
}
