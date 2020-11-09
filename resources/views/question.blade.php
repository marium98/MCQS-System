@extends('layouts.app1')

@section('content')
@if (session('status'))
<div class="alert alert-success" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ session('status') }}
</div>
@elseif(session('failed'))
<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dismiss="alert">×</button>
	{{ session('failed') }}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Questions For The Quiz') }}</div>

               
            </div>
            <form action="/create" method="POST">
                {{ csrf_field() }}
            <div class="card-body">
                <label>Question</label><br />
                <textarea rows="4" cols="50" name="question_text"  type="textarea"> </textarea>
                 <div class="card-body"> 
                     <label>Add Options</label><br />
                    <input name="option_text[]" type="textarea" placeholder="option1">
                    <input name="option_text[]" type="textarea" placeholder="option2"> <br /><br />
                    <input name="option_text[]" type="textarea" placeholder="option3">
                    <input name="option_text[]" type="textarea" placeholder="option4"> <br>
                </div>
                    <label>Correct Answer</label><br />
                    <input name="answer" type="textarea" placeholder="answer"><br /><br />
                    <label>Marks Of Each Question</label><br />
                 <input name="points" type="number" placeholder="Enter points of this question" value="{{old('points')}}">
                  <br/><br />
                <hr>
                <div class="container">
                 <input type="submit" class="btn btn-warning btn-sm" value="Submit">
                <a href="/admin" class="btn btn-primary btn-sm">Back To Dashboard</a>
                <a href="/show" class="btn btn-secondary btn-sm">View Questions</a>
                </div> 
              </div>
        </div>
    </form>
    </div>
</div>
@endsection
