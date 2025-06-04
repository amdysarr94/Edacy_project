<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profinder Dashboad</title>
    <link href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/306230e7b8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('/assets/css/dashboard.css')}}">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Profinder</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{route('dashboard')}}" class="sidebar-link">
                            <i class="fa-solid fa-list"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('profil.edit')}}" class="sidebar-link">
                            <i class="fa-regular fa-user pe-2"></i>
                            Compte
                        </a>
                    </li>


                    <li class="sidebar-item">
                        <a href="{{route('logout')}}" class="sidebar-link">Déconnexion</a>
                    </li>
            </div>
        </aside>
        <div class="main">

            <i class="fa fa-bars d-sm-none fa-2x" onclick="toggleSidebar()" id="sidebar-toggle-icon"></i>

            @yield('content')

        </div>
    </div>
    <script src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/assets/js/dashboard.js')}}"></script>
   
</body>

</html>