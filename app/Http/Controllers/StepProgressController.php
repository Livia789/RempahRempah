<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StepProgress;
use App\Models\Recipe;
use App\Models\CookingHistory;
use Illuminate\Support\Facades\Auth;
use Session;


class StepProgressController extends Controller
{

    public function recipeStepDone($recipe_id){
        if(!Auth::user()) return "not authorized";
        $recipe = Recipe::find($recipe_id);
        $user = Auth::user();
        $totalSteps = $recipe->totalSteps();
        $doneSteps = $user->recipeStepProgress($recipe_id)->count();
        return $totalSteps == $doneSteps;
    }

    public function addRecipeToCookingHistory($user_id, $recipe_id){
        $cookingHistory = new CookingHistory;
        $cookingHistoryTodayExists = CookingHistory::where('user_id', $user_id)->where('recipe_id', $recipe_id)->where('created_at', 'LIKE', '%' . date('Y-m-d') . '%')->first();
        // dump("di step : " . (string)$cookingHistoryTodayExists);
        if(!$cookingHistoryTodayExists){
            $cookingHistory->user_id = $user_id;
            $cookingHistory->recipe_id = $recipe_id;
            $cookingHistory->save();
            return "history added";
        }
        return "history exists";
    }

    public function addStepProgress($step_id, $recipe_id){
        $progress = new StepProgress;
        $progress->user_id = auth()->id();
        $progress->step_id = $step_id;
        $progress->recipe_id = $recipe_id;
        $progress->save();
        $allStepsDone = $this->recipeStepDone($recipe_id);

        if($allStepsDone){
            $addHistoryResp = $this->addRecipeToCookingHistory(Auth::user()->id, $recipe_id);
        }

        $progress = StepProgress::where('user_id', auth()->id())->where('step_id', $step_id)->exists();
        return response()->json([
            'message' => 'Progress added',
            'isProgress' => $progress,
            'allStepsDone' => $allStepsDone,
            'addHistoryResp' => $addHistoryResp ?? ''
        ]);
    }

    public function removeStepProgress($step_id, $recipe_id){
        StepProgress::where('user_id', auth()->id())->where('step_id', $step_id)->where('recipe_id', $recipe_id)->delete();

        $progress = StepProgress::where('user_id', auth()->id())->where('step_id', $step_id)->where('recipe_id', $recipe_id)->exists();
        return response()->json([
            'message' => 'Progress removed',
            'isProgress' => $progress
        ]);
    }

    public function guest_toggleUserStepProgress($step_id, $recipe_id){
        $cookingProgress = Session::get('recipe_'.$recipe_id) ?? [
            'tools' => [],
            'ingredients' => [],
            'steps' => []
        ];

        if(in_array($step_id, $cookingProgress['steps'])){
            $message = 'ok exists';
            $removeIndex = array_search($step_id, $cookingProgress['steps']);
            unset($cookingProgress['steps'][$removeIndex]);
            $cookingProgress['steps'] = array_values($cookingProgress['steps']);
        }else{
            $message = 'not exists';
            array_push($cookingProgress['steps'], $step_id);
        }

        Session::put('recipe_'.$recipe_id, $cookingProgress);
        
        return response()->json([
            'cookingProgress' => Session::get('recipe_'.$recipe_id)
        ]);
    }

    public function toggleStepProgress(Request $req){
        if(auth()->check()){
            $progress = StepProgress::where('user_id', auth()->id())->where('step_id', $req->step_id)->where('recipe_id', $req->recipe_id)->exists();
            if($progress){
                return $this->removeStepProgress($req->step_id, $req->recipe_id);
            }else{
                return $this->addStepProgress($req->step_id, $req->recipe_id);
            }
        }else{
            return $this->guest_toggleUserStepProgress($req->step_id, $req->recipe_id);
        }
    }
}
