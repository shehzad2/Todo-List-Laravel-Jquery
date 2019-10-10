<!DOCTYPE html>
<html lang="en">

<head>
    <title>List Page </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('include/style')
</head>

<body>
    @include('include/header')
    @yield('content')
    @include('include/footer')
    @include('include/script')
    @yield('script')
</body>
</html>