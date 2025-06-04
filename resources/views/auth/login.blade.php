@extends('layouts.auth')
@section('title')
    Connexion
@endsection
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('login.post') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Connexion</h4>
            <div class="">
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" id="email" class="form-control me-5" name="email">
                </div>
                <div class="col">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" id="password" class="form-control me-5" name="password">
                </div>

            </div>
            <div class="d-flex align-items-center justify-content-center mt-5">
                <button type="submit" class="btn btn-success me-2">Se Connecter</button> <a href="{{route('register')}}">S'inscrire</a>
            </div>
        </div>
    </div>
</form>
@endsection