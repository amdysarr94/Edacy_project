<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
   <link rel="stylesheet" href="{{asset('/assets/css/auth_style.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

</head>
<body>
@yield('content')

    <script src="{{asset('/assets/js/script2.js')}}"></script>
    <script src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>