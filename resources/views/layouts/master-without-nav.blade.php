<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Student DMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Student Data Management System" name="description" />
    <meta content="Sabbir Rupom" name="author" />

    <!-- Initialize head assets -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!};
    </script>
</head>

<body>
    @yield('content')
</body>

</html>