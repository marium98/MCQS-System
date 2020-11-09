@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
               
                 <span class="alert-success">   {{ session('message') }} </span>
            </div> <br />
            <a href="/final" class="btn btn-primary btn-sm">Test Score</a>
            <a href="/test" class="btn btn-secondary btn-sm">Start Test</a>
        </div>
    </div>
</div>
@endsection
