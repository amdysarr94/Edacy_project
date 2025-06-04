@extends('layouts.dashboard')
@section('content')
@if(session('success'))
<div class="container d-flex align-items-center justify-content-center">
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
</div>

@endif
<div class="container p-5">
    <div class="card" style="width: 30rem;">
        <div class="card-body text-center">
            <h5 class="card-title">{{$user->username}}</h5>
            <p class="card-text">
            <ul>
                <li><b>Email : </b>{{$user->email}}</li>
                <li><b>Téléphone</b>{{$user->telephone}}</li>
                <li><b>Adresse: </b>{{$user->addresse}}</li>
            </ul>
            </p>
            <div class="d-flex">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fenetre1">Modifier</button>
                <button class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#fenetre2">Modifier mot de passe</button>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#fenetre3">Supprimer</button>
            </div>
            <!-- Modaux -->
            <div class="modal fade" id="fenetre1" tabindex="-1" aria-labelledby="titrefenetre" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content p-5">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="titrefenetre">Modification des informations de compte</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('profil.update') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <label class="form-label">* Nom Complet</label>
                                    <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control" required>
                                </div>
                                <div class="row">
                                    <label class="form-label">* Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                </div>
                                <div class="row">
                                    <label class="form-label">Téléphone</label>
                                    <input type="text" name="telephone" value="{{ old('telephone', $user->telephone) }}" class="form-control">
                                </div>
                                <div class="row">
                                    <label class="form-label">Adresse</label>
                                    <input type="text" name="addresse" value="{{ old('addresse', $user->addresse) }}" class="form-control">
                                </div>
                                <div class="btn-section d-flex justify-content-center mt-5">
                                    <button class="btn btn-primary" type="submit">Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- deuxième modal Modification mot de passe -->
            <div class="modal fade" id="fenetre2" tabindex="-1" aria-labelledby="titrefenetre" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content p-5">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="titrefenetre">Modification mot de passe</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('profil.password') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <label class="form-label">* mot de passe actuel</label>
                                    <input type="password" name="current_password" class="form-control" required>
                                </div>
                                <div class="row">
                                    <label class="form-label">* Nouveau mot de passe</label>
                                    <input type="password" name="new_password" class="form-control" required>
                                </div>
                                <div class="row">
                                    <label class="form-label">* Confirmer nouveau mot de passe</label>
                                    <input type="password" name="new_password_confirmation" class="form-control" required>
                                </div>
                                
                                <div class="btn-section d-flex justify-content-center mt-5">
                                    <button class="btn btn-secondary" type="submit">Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Suppression de compte -->
             <div class="modal fade" id="fenetre3" tabindex="-1" aria-labelledby="titrefenetre" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content p-5">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="titrefenetre">Supprimer le compte</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('profil.delete') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <p>Voulez-vous vraiment supprimer votre compte !</p>
                                
                                <div class="btn-section d-flex justify-content-center mt-5">
                                    <button class="btn btn-danger" type="submit">Supprimer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection