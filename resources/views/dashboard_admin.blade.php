@extends('layouts.app1')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                      @endif
                        {{__('Hello Admin')}}
                   <br />
                    <a href="/insert" class="btn btn-primary btn-sm">
                        {{__('Add Question')}} </a>
                        <a href="/show" class="btn btn-warning btn-sm">
                            {{__('View Questions')}} </a>
                            <a href="/result" class="btn btn-secondary btn-sm">
                                {{__('View Students')}} </a>
                </div>           
            </div>
        </div>
    </div>
</div>
@endsection
