<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StepProgress;


class StepProgressController extends Controller
{

    public function addStepProgress($step_id){
        $progress = new StepProgress;
        $progress->user_id = auth()->id();
        $progress->step_id = $step_id;
        $progress->save();

        $progress = StepProgress::where('user_id', auth()->id())->where('step_id', $step_id)->exists();
        return response()->json([
            'message' => 'Progress added',
            'isProgress' => $progress
        ]);
    }

    public function removeStepProgress($step_id){
        StepProgress::where('user_id', auth()->id())->where('step_id', $step_id)->delete();

        $progress = StepProgress::where('user_id', auth()->id())->where('step_id', $step_id)->exists();
        return response()->json([
            'message' => 'Progress removed',
            'isProgress' => $progress
        ]);
    }

    public function toggleStepProgress(Request $req)
    {
        $progress = StepProgress::where('user_id', auth()->id())->where('step_id', $req->step_id)->exists();
        if($progress){
            return $this->removeStepProgress($req->step_id);
        }else{
            return $this->addStepProgress($req->step_id);
        }
    }
}
