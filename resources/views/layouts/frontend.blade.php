<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Album example · Bootstrap v5.0</title>

    @include('includes.public.style')
    @yield('custome-style')

</head>

<body>

    @include('includes.public.header')

    @yield('content')

    @include('includes.public.footer')
    @include('includes.public.script')

</body>

</html>