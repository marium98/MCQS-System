<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Models\Form;
use DB;

class FormController extends Controller
{
    public function index(){
        return view('form');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
             'contact' => 'required',
            'message' => 'required',
        ]);

        $check = Form::create($data);
        if($check)
        {
            $arr = array('msg' => 'Form has been submitted successfully' , 'status' => true);
        }
        return Response()->json($arr);
    }
    
}
