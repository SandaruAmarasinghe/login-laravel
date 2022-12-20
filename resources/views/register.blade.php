<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <div>
        <h1>Register User</h1>
    </div>
    <form action="{{ route('register') }}" method="post">
        {{csrf_field()}}
        <div id="msg"></div>
        <input type="text" name="name" id="" placeholder="Name" style="margin-bottom: 15px;"><br>
        <input type="email" name="email" id="" placeholder="Email" style="margin-bottom: 15px;"><br>
        <input type="text" name="contact_no" id="" placeholder="Contact No" style="margin-bottom: 15px;"><br>
        <input type="text" name="address" id="" placeholder="Address" style="margin-bottom: 15px;"><br>
        <input type="password" name="password" id="new_password" placeholder="Password" style="margin-bottom: 15px;"><br>
        <input type="password" name="password" id="confirm_password" placeholder="Confirm Password" style="margin-bottom: 15px;"><br>

        <input type="submit" value="Submit">
    </form>

    <a href="{{ route('login_form') }}">Already Have an Account ?</a>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
</body>

<script>
    $(document).ready(function() {

        $('#confirm_password').on('keyup', function() {

            var password = $("#new_password").val();
            var confirmPassword = $("#confirm_password").val();
            if (password != confirmPassword)
                $("#msg").html("Passwords does not match!");
            else {
                $("#msg").html("");

            }

        });

    });
</script>

</html>