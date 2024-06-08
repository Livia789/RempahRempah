<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReviewReaction;
use App\Models\Review;

class ReviewController extends Controller
{
    public $timestamps = false;

    public function likeReview(Request $req){
        $reaction = ReviewReaction::where('review_id', $req->review_id)->where('user_id', $req->user_id)->first();
        $message = '';
        if($reaction != null){
            if($reaction->type == 'like'){
                $reaction = ReviewReaction::where('review_id', $req->review_id)->where('user_id', $req->user_id)->delete();
                $message = 'Like removed';
            }else{
                $reaction = ReviewReaction::where('review_id', $req->review_id)->where('user_id', $req->user_id)->update(['type' => 'like']);
                $message = 'Reaction type updated from dislike to like';
            }
        }else{
            $reaction = new ReviewReaction;
            $reaction->review_id = $req->review_id;
            $reaction->user_id = $req->user_id;
            $reaction->type = 'like';
            $reaction->save();
            $message = 'Like added';
        }
        return response()->json([
            'message' => $message,
            'likeCount' => ReviewReaction::where('review_id', $req->review_id)->where('type', 'like')->count(),
            'dislikeCount' => ReviewReaction::where('review_id', $req->review_id)->where('type', 'dislike')->count(),
            'isLiked' => ReviewReaction::where('review_id', $req->review_id)->where('user_id', $req->user_id)->where('type', 'like')->exists(),
            'isDisliked' => ReviewReaction::where('review_id', $req->review_id)->where('user_id', $req->user_id)->where('type', 'dislike')->exists()
        ]);
    }

    public function dislikeReview(Request $req){
        $reaction = ReviewReaction::where('review_id', $req->review_id)->where('user_id', $req->user_id)->first();
        if($reaction != null){
            if($reaction->type == 'dislike'){
                $reaction = ReviewReaction::where('review_id', $req->review_id)->where('user_id', $req->user_id)->delete();
                $message = 'Dislike removed';
            }else{
                $reaction = ReviewReaction::where('review_id', $req->review_id)->where('user_id', $req->user_id)->update(['type' => 'dislike']);
                $message = 'Reaction type updated from like to dislike';
            }
        }else{
            $reaction = new ReviewReaction;
            $reaction->review_id = $req->review_id;
            $reaction->user_id = $req->user_id;
            $reaction->type = 'dislike';
            $reaction->save();
            $message = 'Dislike added';
        }
        return response()->json([
            'message' => $message,
            'likeCount' => ReviewReaction::where('review_id', $req->review_id)->where('type', 'like')->count(),
            'dislikeCount' => ReviewReaction::where('review_id', $req->review_id)->where('type', 'dislike')->count(),
            'isLiked' => ReviewReaction::where('review_id', $req->review_id)->where('user_id', $req->user_id)->where('type', 'like')->exists(),
            'isDisliked' => ReviewReaction::where('review_id', $req->review_id)->where('user_id', $req->user_id)->where('type', 'dislike')->exists()
        ]);
    }

    public function submitReview(Request $req){
        $review = new Review;
        $review->recipe_id = $req->recipe_id;
        $review->user_id = $req->user_id;
        $review->rating = $req->rating;
        $review->comment = $req->comment;

        if ($req->img) {
            $reviewImg = $req->file('img');
            $reviewImg->store('public/reviewImages');
            $review->img = $reviewImg->hashName();
        }else{
            $review->img = null;
        }
        $review->save();
        return redirect('recipeDetail/'.$req->recipe_id.'?filter=dateDesc');
    }
}