<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MCQS') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
    
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   {{--  {{ config('app.name', 'Laravel') }} --}}
                    Admin Dashboard
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                       
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
   <div class="container">
     <h3 align="center" style="font-size:50px;">Display Data </h3>
     <br />
     
     <div align="right">
       <a href="/insert" class="btn btn-success btn-sm">Add New Question</a>
       <a href="/" class="btn btn-secondary btn-sm">Back To Dashboard</a>
     </div>
     <div class = "table-responsive">
    <div class="container mt-5">
        <table  class="table table-bordered table-striped" id="myTable">
         <thead>
                        <tr>
                        <td>Id</td>
                        <td>Question</td>
                        <td>Option 1</td>
                        <td>Option 2</td>
                        <td>Option 3</td>
                        <td>Option 4</td>
                        <td>Correct Answer</td>
                        <td>Edit</td>
                        <td>Delete</td>
                        </tr>
                        </thead>
                         @foreach ($questions as $question)
                        <tr class="table-warning">
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->question_text }}</td>
                        @php
                        $filtered = $options->where('question_id', $question->id);
                            // print_r($filtered);exit;
                        @endphp
                            <?php foreach($filtered as $value) { ?>
                                <td> <?= $value['option_text']; ?></td>
                            <?php } ?>
                            <td>{{ $question->answer }}</td>
                        <td><a href="show/{{$question->id}}/edit" class="btn btn-primary">Edit</a></td>
                       <td> <form action="show/{{$question->id}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="Delete" class="btn btn-danger"> </td> </form>
                        </tr>
                        @endforeach
         </thead>
         </table>
     </div>
     </div> </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}
   <script>
    $(document).ready( function () {
    $('#myTable').dataTable({
       
    });
} );

</script>
</html>
    
            


{{--  processing: true,
        serverSide: true,
        ajax: '{!! route('show.index') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'question_text', name: 'question_text' },
           
            { data: 'answer', name: 'answer' },
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ] --}}