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
        @foreach ($role->permissions as $permission)
            <li>{{ $permission->name }} <a style="color:red" href="{{ route('role.permission.delete',[$role->id,$permission->id]) }}">Delete</a></li>
        @endforeach
    </ol>

    @if ($role->guard_name == 'admin')
        <form action="{{ route('role.permission.add',$role->id) }}" method="post">
            @csrf
            <select name="permission_id" id="">
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach
            </select>
            <input type="submit" value="add permission to {{ $role->name }}">
        </form>
    @endif

</body>
</html>
