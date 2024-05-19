<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserToolProgress;

class UserToolProgressController extends Controller
{
    public function addUserToolProgress($tool_id, $recipe_id){
        $progress = new UserToolProgress;
        $progress->user_id = auth()->id();
        $progress->tool_id = $tool_id;
        $progress->recipe_id = $recipe_id;
        $progress->save();

        $progress = UserToolProgress::where('user_id', auth()->id())->where('tool_id', $tool_id)->where('recipe_id', $recipe_id)->exists();
        return response()->json([
            'message' => 'Progress added',
            'isProgress' => $progress
        ]);
    }
    
    public function removeUserToolProgress($tool_id, $recipe_id){
        UserToolProgress::where('user_id', auth()->id())->where('recipe_id', $recipe_id)->where('tool_id', $tool_id)->delete();

        $progress = UserToolProgress::where('user_id', auth()->id())->where('recipe_id', $recipe_id)->where('tool_id', $tool_id)->exists();
        return response()->json([
            'message' => 'Progress removed',
            'isProgress' => $progress
        ]);
    }
    
    public function toggleUserToolProgress(Request $req)
    {
        $progress = UserToolProgress::where('user_id', auth()->id())->where('recipe_id', $req->recipe_id)->where('tool_id', $req->tool_id)->exists();
        if($progress){
            return $this->removeUserToolProgress($req->tool_id, $req->recipe_id);
        }else{
            return $this->addUserToolProgress($req->tool_id, $req->recipe_id);
        }
    }

}
