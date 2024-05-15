<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Bookmark;

class BookmarkController extends Controller
{

    public function addBookmark(Request $req){
        $bookmark = new Bookmark();
        $bookmark->user_id = $req->user_id;
        $bookmark->recipe_id = $req->recipe_id;
        $bookmark->save();

        $bookmarkStatus = Bookmark::where('user_id', $req->user_id)->where('recipe_id', $req->recipe_id)->exists();
        return response()->json(['isBookmarked' => $bookmarkStatus]);
    }

    public function removeBookmark(Request $req){
        $bookmark = Bookmark::where('user_id', $req->user_id)->where('recipe_id', $req->recipe_id)->delete();

        $bookmarkStatus = Bookmark::where('user_id', $req->user_id)->where('recipe_id', $req->recipe_id)->exists();
        return response()->json(['isBookmarked' => $bookmarkStatus]);
    }

    public function toggleBookmark(Request $req){
        $bookmark = Bookmark::where('user_id', $req->user_id)->where('recipe_id', $req->recipe_id)->first();
        if($bookmark){
            return $this->removeBookmark($req);
        }else{
            return $this->addBookmark($req);
        }
    }
}
