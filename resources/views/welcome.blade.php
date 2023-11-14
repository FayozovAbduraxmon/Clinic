<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <form action="/xaridor" method="POST">
        @csrf


        <label name="name" for="">Name</label>

        <label for="">price</label>
        <input type="number" name="price">

        <button type="submit">OK</button>


    </form>
    <table>
        <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>price</th>
    </tr>
</thead>
<tbody>
    @foreach ($xaridor as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>            
        </tr>
    @endforeach
</tbody>
</table>









</body>
</html>