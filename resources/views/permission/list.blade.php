<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <ol>
        @foreach($permissions as $permission)
            <li><a href="{{ route('permission.edit',$permission->id) }}">{{ $permission->name }}</a>
                <a style="color:red" href="{{ route('permission.delete',$permission->id) }}">Delete</a>
            </li>
        @endforeach
    </ol>
    <a href="{{ route('permission.new') }}">add permission</a>
</body>
</html>
