<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profinder</title>
    <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-md  bg-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><span class="space-grotesk">Profinder</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                <a href="{{route('login')}}" class="btn btn-success">Se connecter</a>
            </div>
        </div>
    </nav>
</header>

    @yield('content')
   <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <h4>Profinder</h4>
                    <p>Annuaire en ligne des entreprises</p>
                    <div class="col-lg-4 text-lg-start">Copyright &copy; 2025</div>
                    <div class="col-lg my-3 text-lg-end">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-x-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    
                </div>
            </div>
        </footer>
    <script src="{{asset('/assets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>