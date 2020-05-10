<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<ol>
    @foreach($user_roles = $user->roles()->get() as $role)
        <li>
            {{ $role->name }}
            @if(auth()->guard('admin')->user()->hasPermissionTo('user edit','admin'))
                <a style="color:red" href="{{ route('user.remove.role',[$user->id,$role->id]) }}">Remove</a>
            @endif
        </li>
    @endforeach
    @if(!$user_roles->count())
        <h2>{{ $user->email }} not have any role</h2>
    @endif

    @if(auth()->guard('admin')->user()->hasPermissionTo('user edit','admin'))
        <form action="{{route('user.add.role',$user->id)}}" method="post">
            @csrf
            <select name="role_id" id="">
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            <input type="submit" value="add role to {{ $user->email }}">
        </form>
    @endif

</ol>
</body>
</html>
