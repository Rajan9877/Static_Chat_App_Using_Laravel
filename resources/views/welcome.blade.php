<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Include the CSRF token -->

    <title>Static Chatting App</title>
    <style>
        #submit-form {
            display: none;
        }
        #submit-form input{
            padding: 10px 15px;
            border-radius: 50px;
            color: red;
            border-color: red;
            outline: none;
        }
        .user{
            font-weight: bold;
            color: red;
        }
        .message{
            color: green;
        }
        h1{
            text-align: center;
            color: red;
        }
        .uppercontainer{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .container{
            width: 100%;
            display: none;
        }
        .maincontainer{
            padding: 15px;
            width: 97.5%;
            border: 2px solid red;
            border-radius: 50px;
        }
        #user-form input{
            padding: 10px 15px;
            border-radius: 50px;
            color: red;
            border-color: red;
            outline: none;
        }
        .btn{
            padding: 10px 15px;
            border-radius: 50px;
            border-color: red;
            background: transparent;
            color: red;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn:hover{
            background-color: red;
            color: white;
        }
        #chatmsg{
            display: none;
        }
    </style>

    @vite('resources/js/app.js')
</head>

<body>
    {{-- <button id="submit-button" type="button">
        Press Me!
    </button> --}}
    <h1 id="startmsg">Start Chatting</h1>
    <div class="uppercontainer">
        <form id="user-form">
            <input type="text" placeholder="Enter Your Name" id="name" required>
            <button class="btn">Let's Start</button>
        </form>
        <form id="submit-form">
            <input type="hidden" id="user" name="user" required>
            <input type="text" id="message" placeholder="Enter Your Message" name="message" required>
            <button class="btn" id="send-button">Send</button>
        </form>
        <h1 id="chatmsg">Chats</h1>
        <div class="container">
            <div class="maincontainer">
                <!-- Content will be dynamically added here -->
            </div>
        </div>
    </div>    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $("#user-form").submit(function (e) {
            e.preventDefault();
            $(this).hide();
            $('#user').val($('#name').val());
            $('#submit-form').show();
            $('#chatmsg').show();
            $('.container').show();
            $('#startmsg').html('Do Chatting');
        });

        $('#submit-form').submit(function (e) {
            e.preventDefault();
            // Get the CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        
        // Get the form data
        var formData = $(this).serialize();

        // Add the CSRF token to the form data
        formData += '&_token=' + csrfToken;

            // Make an AJAX request to your Laravel controller
            $.ajax({
                type: "POST",
                url: "{{ route('chat') }}", // Replace with your actual route
                data: formData,
                success: function (response) {
                    // Handle the response from the server
                    // console.log(response);
                    $('#message').val('');
                },
                error: function (xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
</body>
</html>
