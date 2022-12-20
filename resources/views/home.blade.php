<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <br />
    <br />
    <br />
    <h2 align="center">VIEW DATA</h2><br />
    <div>
        <div>
            <span>Search</span>
            <input type="text" name="search_text" id="search_text" placeholder="Search by Email" />
        </div>

    </div>
    <br />
    <div id="result"></div>

    <div id="msg"></div>

    <a href="{{route('insert')}}"><button>Insert</button></a>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($datas as $data)
            <tr id="tr">
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->address }}</td>
                <td><a href="{{ route('edit_data_form', $data->id) }}">edit</a></td>
                <td><button class="delete" value="{{ $data->id }}">Delete</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
    $(".delete").click(function() {
                var btn = $(this);
                var id = $(this).val();
                var token = $(this).data("token");
                $.ajax({
                    url: "/delete/" + id,
                    type: 'GET',
                    dataType: "JSON",
                    data: {
                        "id": id,
                    },
                    success: function(response) {
                        // $("#msg").append('Deleted').html();
                        console.log(response)
                        alert(response)
                        btn.closest("tr").remove(); // closest tr removed
                        // console.log("it Work");
                    }
                });
            });
</script>

<script>
    $(document).ready(function() {

        load_data();

        function load_data(query) {
            $.ajax({
                url: "fetch",
                method: "post",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function() {
            var search = $("#search_text").val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>




</html>