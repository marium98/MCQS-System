<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Option;
use App\Models\Question;

class QuestionController extends Controller
{

    public function index(){
        return view('show');
    }
    public function insert(){
        return view('question');
    }
    public function create(Request $request){
        
        $rules = [
			'question_text' => 'required|string|min:3|max:5000',	
		];
		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return redirect('insert')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();
          
			try{
				$question = new Question;
                $question->question_text = $data['question_text'];
                $question->answer = $data['answer'];
                $question->save();
                $lastid = $question->id; 


         //Bulk Insertion//      
 $options = $request->option_text;
 $points = $request->points;
 $array = []; //initialize array

 foreach($options as $value) //loop for option tables
 {
     $bulkarray = [];
     $bulkarray['question_id'] = $lastid;
     $bulkarray['option_text'] = $value;
    
     if($question->answer == $value) //conditions for correct answer
     {  
        $bulkarray['points'] = $points;
     }
     else{
        $bulkarray['points'] = 0;   
     }

     $array[] =  $bulkarray ;
 }   
Option::insert($array);

    return redirect('insert')->with('status',"Question added successfully");
 }
			
			catch(Exception $e){
				return redirect('insert')->with('failed',"operation failed");
			}
		}
    }
}


 //dd($lastid);
               /*  $option = new Option;
                $data = $request->all();
                foreach($option as $option){
                    $options[] = [
                        'option_text' => option_text,
                        'answer' => answer,
                        'question_id' => $lastid,
                    ];
                }
                Option::insert($options);
                //dd($options); */