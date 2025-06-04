@extends('layouts.auth')
@section('title')
    Inscription
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
    <form action="{{ route('register.save') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Créer votre compte</h2>
                <p class="text-justify">Veuillez renseigner votre nom complet, email, adresse et mot de passe pour la
                    création de votre compte</p>
            </div>
            <div class="card-body">
                <div class="pagination">
                    <div class="number active" id="stepNum1" data-step-num="1">1</div>
                    <div class="bar"></div>
                    <div class="number" id="stepNum2" data-step-num="2">2</div>
                    <div class="bar"></div>
                    <div class="number" id="stepNum3" data-step-num="3">3</div>

                </div>
                <div class="steps">
                    <div class="step active" id="step1" data-step="1">
                        <h4 class="text-center">Informations de contact</h4>
                        <div class="">
                            <div class="col">
                                <label for="username" class="form-label">Nom Complet</label>
                                <input type="text" id="username" class="form-control me-5" name="username">
                            </div>
                            <div class="col">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="tel" id="telephone" class="form-control me-5" name="telephone">
                            </div>
                            <div class="col">
                                <label for="adresse" class="form-label">Adresse</label>
                                <input type="text" id="adresse" class="form-control" name="addresse">
                            </div>
                        </div>

                    </div>
                    <div class="step" id="step2" data-step="2">
                        <h4>Informations de connexion</h4>
                        <div class="flex">
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control me-5" name="email">
                            </div>
                            <div class="col">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" id="password" class="form-control" name="password">
                            </div>
                            <div class="col">
                                <label for="confirmPassword" class="form-label">Confirmer le mot de passe</label>
                                <input type="password" id="confirmPassword" class="form-control" name="password_confirmation">
                            </div>

                        </div>
                        

                    </div>
                    <div class="step" id="step3" data-step="3">
                        <p class="text-center">Vous êtes sur de vouloir soumettre le formulaire</p>
                        <div class="col custom-flex">
                            <div>
                                <button type="submit" class="btn btn-dark p-2">S'inscrire</button>
                            </div>
                            

                        </div>
                    </div>
                    <div class="step-dots d-flex justify-content-center mt-4">
                        <span class="dot active" onclick="goToStep(1)"></span>
                        <span class="dot" onclick="goToStep(2)"></span>
                        <span class="dot" onclick="goToStep(3)"></span>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection