<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'review_reactions')->where('type', 'like');
    }

    public function dislikes(){
        return $this->belongsToMany(User::class, 'review_reactions')->where('type', 'dislike');
    }
}
