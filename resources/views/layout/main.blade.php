<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layout.link')


</head>

<body>
    @include('layout.header')
    <div class="container">
        @yield('main')
    </div>

    @include('layout.footer')
</body>

</html>
