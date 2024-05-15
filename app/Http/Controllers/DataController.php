<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getData()
    {
        $data = [
            'name' => 'John Doe',
            'age' => 30,
            'email' => 'john@example.com'
        ];
        
        return response()->json($data);
    }

    public function goToDataPage(){
        return view('data');
    }
}
