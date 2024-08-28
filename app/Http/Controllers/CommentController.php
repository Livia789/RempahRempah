<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Recipe;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $req){
        $recipe = Recipe::find($req->recipe_id);
        if($recipe && Auth::user() && (Auth::user()->id == $recipe->user_id || $recipe->isPublished())){
            $comment = new Comment;
            $comment->message = $req->message;
            $comment->user_id = Auth::user()->id;
            $comment->recipe_id = $req->recipe_id;
            $comment->save();

            return redirect()->back()->with('scrollTo', 'commentSection');
        }
    }

    public function addReply(Request $req){
        $comment = Comment::find($req->comment_id);
        if($comment){
            $reply = new Reply;
            $reply->message = $req->message;
            $reply->user_id = Auth::user()->id;
            $reply->comment_id = $req->comment_id;
            $reply->save();

            return redirect()->back()->with('scrollTo', 'commentSection');
        }
    }

    public function deleteComment(Request $req){
        $comment = Comment::find($req->comment_id);
        if($comment && Auth::user() && (Auth::user()->id == $comment->user_id || Auth::user()->isAdmin())){
            $comment->delete();
        }

        return redirect()->back()->with('scrollTo', 'commentSection');
    }

    public function deleteReply(Request $req){
        $reply = Reply::find($req->reply_id);
        if($reply && Auth::user() && (Auth::user()->id == $reply->user_id || Auth::user()->isAdmin())){
            $reply->delete();
        }

        return redirect()->back()->with('scrollTo', 'commentSection');
    }
}
