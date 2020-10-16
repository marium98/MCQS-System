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
                @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
            </div>
        <a href="{{route('test.index')}}" class="btn btn-primary">Start The Test</a>
     {{--    <a href="{{route('final.show',app()->getLocale())}}" class="btn btn-secondary">View Score</a> --}}
        </div>
    </div>
</div>
@endsection
