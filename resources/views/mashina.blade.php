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
    <form action="/mashina" method="POST">
        @csrf

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <label for="">Name</label>
        <input type="text" name="name">

        <label for="">Color</label>
        <input type="text" name="color">

        <button type="submit">OK</button>


    </form>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>color</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($xaridor as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->color }}</td>
                    @if ($item->deleted_at != null)
                        <td><a href="/restore_mashina/{{ $item->id }}">Restore</a></td>
                    @else
                        <td><a href="/delete_mashina/{{ $item->id }}">DELETE</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>









</body>

</html>
