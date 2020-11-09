<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  <style>
   .error{ color:red; } 
  </style>
    <title>Form</title>
</head>
<body>
    <div class="container">
    <h1> Contact Form </h1>
    <form method="POST" action="javascript:void(0)" id="contact_form">
       
        <div class="alert alert-success d-none" id="msg_div">
            <span id="res_message"></span>
       </div>
       <div class="form-group">
    <label>Full Name</label>
    <input type="text" name="name" class="form-control" placeholder="Enter Name" id="name">
    <span class="text-danger">{{$errors->first('name')}}</span>
       </div>

       <div class="form-group">
    <label>Email</label>
    <input type="email" name="email"  class="form-control" placeholder="Enter Email" id="email">
    <span class="text-danger">{{$errors->first('email')}}</span>
       </div>

       <div class="form-group">
    <label>Contact</label>
    <input type="number" name="contact"  class="form-control" placeholder="Enter Contact" id="contact">
    <span class="text-danger">{{$errors->first('contact')}}</span>
       </div>

       <div class="form-group">
    <label>Message</label>
    <textarea class="form-control" rows="3" name="message" placeholder="Enter Message"></textarea>
    <span class="text-danger">{{ $errors->first('message') }}</span>
       </div>

       <div class="form-group">
        <button type="submit" id="btn" class="btn btn-primary">Submit</button>
    </div>
    </form>
    </div>
</body>

<script>
if ($("#contact_form").length > 0) {
    $("#contact_form").validate({
      
    rules: {
      name: {
        required: true,
        maxlength: 50
      },
      email: {
        required: true,
        maxlength: 50,
        email: true,
      },
      contact:{
        required: true,
        maxlength: 11

      },

      message: {
        required: true,
        maxlength: 250
      }

    },
    messages: {
      name: {
                    required: "Please Enter Name",
                    maxlength: "Your last name maxlength should be 50 characters long."
      },
      email: {
                    required: "Please enter valid email",
                    email: "Please enter valid email",
                    maxlength: "The email name should less than or equal to 50 characters",
                },
      contact: {
                    required: "Please enter valid contact number",
                    maxlength: "Incorrect number format",

      },
      message: {
                    required: "Please Enter message",
                    maxlength: "Your last message maxlength should be 250 characters long."
      },
    },
    submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('#btn').html('Sending..');
      $.ajax({
        url: "{{url('form')}}",
        type: "POST",
        data: $('#contact_form').serialize(),
        success: function( response ) {
            $('#btn').html('Submit');
            $('#res_message').show();
            $('#res_message').html(response.msg);
            $('#msg_div').removeClass('d-none');
 
            document.getElementById("contact_form").reset(); 
            setTimeout(function(){
            $('#res_message').hide();
            $('#msg_div').hide();
            },10000);
        }
      });
    }
  })
}

    </script>
</html>