<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appcart Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.create') }}">Add User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">User List</a>
            </li>
        </div>
    </nav>
    
    <div class="container">
        @yield('content')
    </div>

    
    <script src="{{ asset('js/users.js') }}"></script>

</body>
</html>
