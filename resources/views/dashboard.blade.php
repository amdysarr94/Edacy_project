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
    <button class="btn btn-dark my-2" data-bs-toggle="modal" data-bs-target="#fenetre1"><i class="fas fa-plus me-1"></i> Nouveau contact</button>
    <div class="modal fade" id="fenetre1" tabindex="-1" aria-labelledby="titrefenetre" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-5">
                <div class="modal-header">
                    <h5 class="modal-title" id="titrefenetre">Ajouter Informations de contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('contacts.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <label class="form-label">* Nom de l'entreprise</label>
                            <input type="text" name="nom_entreprise" class="form-control" required>
                        </div>
                        <div class="row">
                            <label class="form-label">* Secteur d'activité</label>
                            <input type="text" name="secteur_activite" class="form-control" required>
                        </div>
                        <div class="row">
                            <label class="form-label">* Email</label>
                            <input type="email" name="email_entreprise" class="form-control" required>
                        </div>
                        <div class="row">
                            <label class="form-label">* Téléphone</label>
                            <input type="tel" name="telephone_entreprise" class="form-control" required>
                        </div>
                        <div class="row">
                            <label class="form-label">* Adresse</label>
                            <input type="text" name="adresse_entreprise" class="form-control" required>
                        </div>
                        <div class="btn-section d-flex justify-content-center mt-5">
                            <button class="btn btn-dark" type="submit">Ajouter</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="table-responsive d-none d-md-block">
        <table class="table table-borderless table-hover align-middle">
            <thead>
                <tr>
                    <th>Nom de l'entreprise</th>
                    <th>Secteur d'activité</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                <tr>
                    <td>{{ $contact->nom_entreprise }}</td>
                    <td>{{ $contact->secteur_activite }}</td>
                    <td>{{ $contact->email_entreprise }}</td>
                    <td>{{ $contact->telephone_entreprise }}</td>
                    <td>{{ $contact->adresse_entreprise }}</td>
                    <td>
                        <div class="d-flex">
                            <i class="fa-solid fa-pen me-2 mt-1" style="cursor: pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $contact->id }}"></i>
                            <div class="modal fade" id="editModal{{ $contact->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content p-5">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modifier le contact</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label class="form-label">Nom de l'entreprise</label>
                                                    <input type="text" name="nom_entreprise" value="{{ $contact->nom_entreprise }}" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Secteur d'activité</label>
                                                    <input type="text" name="secteur_activite" value="{{ $contact->secteur_activite }}" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email_entreprise" value="{{ $contact->email_entreprise }}" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Téléphone</label>
                                                    <input type="text" name="telephone_entreprise" value="{{ $contact->telephone_entreprise }}" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Adresse</label>
                                                    <input type="text" name="adresse_entreprise" value="{{ $contact->adresse_entreprise }}" class="form-control">
                                                </div>

                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-dark">Mettre à jour</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn p-0 ms-3">
                                    <i class="fa-solid fa-trash" style="color: #0c0d0d;"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Aucun contact trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-md-none">
        @forelse($contacts as $contact)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <p><strong>Nom :</strong> {{ $contact->nom_entreprise }}</p>
                <p><strong>Secteur :</strong> {{ $contact->secteur_activite }}</p>
                <p><strong>Email :</strong> {{ $contact->email_entreprise }}</p>
                <p><strong>Téléphone :</strong> {{ $contact->telephone_entreprise }}</p>
                <p><strong>Adresse :</strong> {{ $contact->adresse_entreprise }}</p>

                <div class="d-flex justify-content-end">

                    <i class="fa-solid fa-pen me-2 mt-1" style="cursor: pointer;"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $contact->id }}-1"></i>

                    <div class="modal fade" id="editModal{{ $contact->id }}-1" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content p-3">
                                <div class="modal-header">
                                    <h5 class="modal-title">Modifier le contact</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label class="form-label">Nom</label>
                                            <input type="text" name="nom_entreprise" value="{{ $contact->nom_entreprise }}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Secteur d'activité</label>
                                            <input type="text" name="secteur_activite" value="{{ $contact->secteur_activite }}" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email_entreprise" value="{{ $contact->email_entreprise }}" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Téléphone</label>
                                            <input type="text" name="telephone_entreprise" value="{{ $contact->telephone_entreprise }}" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Adresse</label>
                                            <input type="text" name="adresse_entreprise" value="{{ $contact->adresse_entreprise }}" class="form-control">
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-dark">Mettre à jour</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton Supprimer -->
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn p-0 ms-3">
                            <i class="fa-solid fa-trash" style="color: #0c0d0d;"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="alert alert-info">Aucun contact trouvé.</div>
        @endforelse
    </div>

</div>
@endsection