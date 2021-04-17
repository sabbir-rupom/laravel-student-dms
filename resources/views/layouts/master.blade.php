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
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!};
    </script>
</head>

<body>
    <header>
        @include('layouts.navbar')
    </header>
    <section id="content--main" class="pt-3 pb-3">
        <div class="container">
            @yield('content')
        </div>
    </section>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>