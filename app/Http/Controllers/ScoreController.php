<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use App\Models\Option;
use App\Models\Result;
use DB;
use Auth;

class ScoreController extends Controller
{
    public function display()
    {
       $id = Auth()->user()->id;
       $users = DB::table('users')->where('id', '=' , $id)->first();
       $scores = DB::table('results')->where('user_id', '=' , $id)->first();
       return view('final',compact('id','users','scores'));
    }
}
