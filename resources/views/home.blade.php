@extends('layouts.app')
@section('content')
<main class="py-5 space-grotesk">
    <div class="container-fluid bg-light">
        <div class="container bg-light py-5">
            <div class="row">
                <div class="col pt-5">
                    <h1>Annuaire des entreprises</h1>
                    <p>Profinder connecte les entreprises à leurs potentiels clients</p>
                    <a href="#contacts" class="btn btn-dark">Consulter</a>
                </div>
                <div class="col align-items-start">
                    <div class="shape"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filtre -->
     <div class="container py-5" id="contacts">
    <h2 class="mb-4 text-black">Liste des Contacts</h2>

    
    <div class="alphabet-filter mb-3">
        @foreach(range('A', 'Z') as $char)
            <a href="{{ route('contacts.index', ['letter' => $char]) }}"
               class="btn btn-sm {{ request('letter') === $char ? 'btn-success' : 'btn-dark' }}">
                {{ $char }}
            </a>
        @endforeach
        <a href="{{ route('contacts.index') }}" class="btn btn-sm btn-success">All</a>
    </div>

    <!-- Liste des contacts -->
    <ul class="list-group mb-3">
        @forelse ($contacts as $contact)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $contact->nom_entreprise }}
                <a href="#" data-bs-toggle="modal" data-bs-target="#contactModal{{ $contact->id }}">
                    <i class="fas fa-circle-info text-dark"></i>
                </a>
            </li>

            <!-- Modal -->
            <div class="modal fade" id="contactModal{{ $contact->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $contact->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel{{ $contact->id }}">{{ $contact->nom_entreprise }}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Secteur d'activité :</strong> {{ $contact->secteur_activite }}</p>
                            <p><strong>Email :</strong> {{ $contact->email_entreprise }}</p>
                            <p><strong>Téléphone :</strong> {{ $contact->telephone_entreprise }}</p>
                            <p><strong>Adresse :</strong> {{ $contact->adresse_entreprise }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <li class="list-group-item">Aucun contact pour "{{ $letter }}"</li>
        @endforelse
    </ul>

    <div class="pagination-container">
        {{ $contacts->links('vendor.pagination.bootstrap-5-custom') }}
    </div>
</div>
</main>
@endsection