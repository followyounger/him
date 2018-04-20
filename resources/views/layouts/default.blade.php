<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','王朝阳')</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
    @include('layouts._header')
    <div class="container">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
    </div>

    <script src="/js/app.js"></script>
</body>
</html>