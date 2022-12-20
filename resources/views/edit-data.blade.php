<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>
    <div>
        <h1>Edit Data</h1>
    </div>
    <form action="{{ route('edit') }}" method="post">
        {{csrf_field()}}
        
        <input type="hidden" name="id" id="" value="{{$data->id}}" style="margin-bottom: 15px;"><br>
        <input type="text" name="name" id="" value="{{$data->name}}" style="margin-bottom: 15px;"><br>
        <input type="email" name="email" id="" value="{{$data->email}}" style="margin-bottom: 15px;"><br>
        <input type="text" name="address" id="" value="{{$data->address}}" style="margin-bottom: 15px;"><br>

        <input type="submit" value="Update">
    </form>
</body>

</html>