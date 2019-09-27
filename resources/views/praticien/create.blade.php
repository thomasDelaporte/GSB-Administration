@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        
        <div class="card-header">Créaion d'un praticien</div>

        <form method="post" class="card-body" action="{{ route('praticien.store') }}">
            @method('POST')
            @csrf

            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" name="nom" />

                @error('nom')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" name="prenom" />

                @error('prenom')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" class="form-control" name="adresse" />

                @error('adresse')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="ville">Ville:</label>
                <input type="text" class="form-control" name="ville" />

                @error('ville')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="codePostal">Code postal:</label>
                <input type="text" class="form-control" name="codePostal" />

                @error('codePostal')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="etatCivil">Etat civil:</label>
                <input type="text" class="form-control" name="etatCivil" />

                @error('etatCivil')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="origine">Origine:</label>
                <input type="text" class="form-control" name="origine" />

                @error('origine')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="influence">Influence:</label>
                <input type="number" class="form-control" name="influence"  />

                @error('influence')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="entourage">Entourage:</label>
                <input type="text" class="form-control" name="entourage" />

                @error('entourage')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="diplome">Diplome:</label>
                <input type="text" class="form-control" name="diplome" />

                @error('diplome')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="coefficientPrescription">Coefficient de prescription:</label>
                <input type="text" class="form-control" name="coefficientPrescription" />

                @error('coefficientPrescription')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
    </div>
</div>
@endsection
