<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','王朝阳')</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
    @include('layouts._header')
    <div class="container">
        @yield('content')
        @include('layouts._footer')
    </div>

</body>
</html>