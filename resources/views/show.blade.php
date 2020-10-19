
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
   
    <div class="col-md-11">
        <table border="2" class="table table-hover" id="myTable">
         <thead>
         <tr>
         <td>Id</td>
         <td>Question</td>
         <td>Correct Answer</td>
         <td>Created At</td>
         <td>Updated At</td>
         <td>Edit</td>
         <td>Delete</td>
         </tr>
         </thead>
         </table>
     </div>
</body>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
   <script>
    $(document).ready( function () {
    $('#myTable').dataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('getQuestion') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'question_text', name: 'question_text' },
            { data: 'answer', name: 'answer' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
        ]
    });
} );

</script>
</html>
    
            


