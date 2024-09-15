<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/css/style.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('assets/js/sb-admin-2.js') }}"></script>
</body>
</html>
