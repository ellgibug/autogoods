
    @if(Auth::guard('web')->check())
        <p>User</p>
    @else
        <p>Not user</p>
    @endif

    @if(Auth::guard('admin')->check())
        <p>Admin</p>
    @else
        <p>Not Admin</p>
    @endif

