@extends('layouts.app')

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
                <div class="card-header">{{ __('Questions') }}</div>
                <div class="card-body">
                <form action="test"  method="POST">
                 @csrf
                    @foreach ($questions as $question)
                    <div class="card-header">
                   {{ $question->question_text }}
                    </div>

                    @php
                    $filtered = $options->where('question_id', $question->id);
                    @endphp
                        <?php foreach($filtered as $value) { ?> <br />  

 <input type="radio" name="questions[{{ $question->id }}]" value="{{ $value->id }}"><?= $value['option_text']; ?>
 @if(old("questions.$question->answer") == $value['option_text']) checked @endif
 </>  <?php } ?>
                  @endforeach 
                   <br />
                  <input type="submit" class="btn btn-primary" value="Submit">

                    </form>
                </div>
            </div>
            <br /> <br />

           
        </div>
    </div>
</div>
@endsection


  