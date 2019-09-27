@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">

                <div class="card-header">Activite : {{ $activite->idActivite }}</div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" name="date" value={{ $activite->date }} readonly />
                    </div>

                    <div class="form-group">
                        <label for="theme">Thème:</label>
                        <input type="text" class="form-control" name="theme" value={{ $activite->theme }} readonly />
                    </div>

                    <div class="form-group">
                        <label for="salle">Salle:</label>
                        <input type="text" class="form-control" name="salle" value={{ $activite->salle }} readonly />
                    </div>
                    
                    <div class="form-group">
                        <label for="visiteur">Responsable:</label>
                        <input type="text" class="form-control" name="visiteur" value="{{ $activite->visiteurMedical->nom }} {{ $activite->visiteurMedical->prenom }}" readonly />
                    </div>

                    <div class="form-group">
                        <label for="numeroAccord">Numéro accord:</label>
                        <input type="text" class="form-control" name="numeroAccord" value={{ $activite->numeroAccord }} readonly />
                    </div>

                    <div class="form-group">
                        <label for="budget">Budget:</label>
                        <input type="number" class="form-control" name="budget" value={{ $activite->budget }} readonly />
                    </div>

                    <div class="form-group">
                        <label for="compteRendu">Compte rendu:</label>
                        <textarea class="form-control" name="compteRendu" readonly>{{ $activite->compteRendu }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card">

                <div class="card-header">
                    Praticiens invités
                    
                    <div class="card-header-actions">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjouterPraticien">
                            Ajouter
                        </button>
                    </div>
                </div>

                <table class="card-body table table-striped">
                    <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Prénom</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($praticiens_invited as $praticien)
                            <tr>
                                <td>{{ $praticien->nom }}</td>
                                <td>{{ $praticien->prenom }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAjouterPraticien" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" class="modal-content" action="{{ route('activite.praticien', $activite->idActivite) }}">
            @method('POST')
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Inviter un praticien</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label for="praticien">Praticien:</label>
                    <select class="form-control" name="praticien" >
                        @foreach($praticiens as $praticien)
                            <option value="{{ $praticien->idPraticien }}">{{ $praticien->nom }} {{ $praticien->prenom }}</option>
                        @endForeach
                    </select>

                    @error('praticien')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>
</div>
@endsection
