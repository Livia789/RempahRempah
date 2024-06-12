<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserToolProgress;
use Session;

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

    public function guest_toggleUserToolProgress($tool_id, $recipe_id){
        $cookingProgress = Session::get('recipe_'.$recipe_id) ?? [
            'tools' => [],
            'ingredients' => [],
            'steps' => []
        ];

        if(in_array($tool_id, $cookingProgress['tools'])){
            $message = 'ok exists';
            $removeIndex = array_search($tool_id, $cookingProgress['tools']);
            unset($cookingProgress['tools'][$removeIndex]);
            $cookingProgress['tools'] = array_values($cookingProgress['tools']);
        }else{
            $message = 'not exists';
            array_push($cookingProgress['tools'], $tool_id);
        }

        Session::put('recipe_'.$recipe_id, $cookingProgress);
        
        return response()->json([
            'cookingProgress' => Session::get('recipe_'.$recipe_id),
        ]);
    }
    
    public function toggleUserToolProgress(Request $req)
    {
        if(auth()->check()){
            $progress = UserToolProgress::where('user_id', auth()->id())->where('recipe_id', $req->recipe_id)->where('tool_id', $req->tool_id)->exists();
            if($progress){
                return $this->removeUserToolProgress($req->tool_id, $req->recipe_id);
            }else{
                return $this->addUserToolProgress($req->tool_id, $req->recipe_id);
            }
        }else{
            return $this->guest_toggleUserToolProgress($req->tool_id, $req->recipe_id);
        }
    }

}
