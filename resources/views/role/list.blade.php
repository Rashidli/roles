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
    @foreach($roles as $role)
        <li>
            <a href="{{ route('role.edit',$role->id) }}">{{ $role->name }}</a>
            @if ($role->guard_name == 'admin')
                <a href="{{ route('role.permissions',$role->id) }}">Permissions</a>
            @endif
            <a style="color:red" href="{{ route('role.delete',$role->id) }}">Delete</a>
        </li>
    @endforeach
</ol>
<a href="{{ route('role.new') }}">add role</a>
</body>
</html>
