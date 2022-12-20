<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert</title>
</head>

<body>

    <div>
        <h1>Insert Data</h1>
    </div>
    <form action="{{ route('insert') }}" method="post">
        {{csrf_field()}}
        <input type="text" name="name" id="" placeholder="Name" style="margin-bottom: 15px;"><br>
        <input type="email" name="email" id="" placeholder="Email" style="margin-bottom: 15px;"><br>
        <input type="text" name="address" id="" placeholder="Address" style="margin-bottom: 15px;"><br>

        <input type="submit" value="Insert">
    </form>


</body>

</html>