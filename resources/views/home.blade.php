@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card" style="margin-bottom: 30px">
            <div class="card-header">Administration</div>

            <div class="card-body">
                Vous êtes authentifié!
            </div>
        </div>

        @if ($informations != null)
            <div class="card">
                <div class="card-header">
                    Information utilisateur connecté

                    <div class="card-header-actions">
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" disabled data-target="#modalAjouterPraticien">
                            WebService
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><b>idDelegue</b> : {{ $informations->idDelegue}}</li>
                        <li class="list-group-item"><b>Nom</b> : {{ $informations->nom}}</li>
                        <li class="list-group-item"><b>Prénom</b> : {{ $informations->prenom}}</li>
                        <li class="list-group-item"><b>Adresse</b> : {{ $informations->adresse}}</li>
                        <li class="list-group-item"><b>Ville</b> : {{ $informations->ville}}</li>
                        <li class="list-group-item"><b>Code postal</b> : {{ $informations->codePostal}}</li>
                        <li class="list-group-item"><b>Email</b> : {{ $informations->email}}</li>
                        <li class="list-group-item"><b>Salaire</b> : {{ $informations->salaire}}€</li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
@endsection
