<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login User</h1>
    <form action="{{ route('login') }}" method="post">
        {{csrf_field()}}

        <input type="email" name="email" id="" placeholder="Email" style="margin-bottom: 15px;"><br>
        <input type="password" name="password" id="" placeholder="Password" style="margin-bottom: 15px;"><br>

        <input type="submit" value="Login">
    </form>
</body>

</html>