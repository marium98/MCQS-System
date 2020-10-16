@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Your test score is') }}
                  </div>
            
            </div>
            <a href="{{route('home')}}" class="btn btn-secondary">Back To Dashboard</a>
        </div>
    </div>
</div>
@endsection
