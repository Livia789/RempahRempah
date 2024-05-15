<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function postData(Request $request)
    {
        // Handle the posted data
        $data = $request->all();

        return response()->json(['message' => 'Data received successfully']);
    }

    public function showPage(){
         return view('ajax');
    }
}
