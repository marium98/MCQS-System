<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Question;
use App\Models\Option;
use App\Models\Result;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\Middleware\Test;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;



class TestController extends Controller
{

     public function __construct(){
        $this->middleware(Test::class)->only(['index']);
       
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $questions = Question::with(['questionOptions'])->get();
        $options = Option::all();
        return view('test',compact('questions', 'options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $value = Option::find(array_values($request->input('questions')));
        $result = auth()->user()->userResults()->create([
            'total_points' => $value->sum('points')
        ]);
         //Auth::user->id
        $user = User::find(Auth::user()->id);
        $user->test_taken = 1;
        $user->save();
        return redirect()->route('final')->with('message', 'Check your score now');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      /*   $user = User::all();
        $user->test_taken = 1;
        $user->save(); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
