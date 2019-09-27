@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        
        <div class="card-header">Modification praticien : {{ $praticien->idPraticien }}</div>

        <form method="post" class="card-body" action="{{ route('praticien.update', $praticien->idPraticien) }}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" name="nom" value={{ $praticien->nom }} />

                @error('nom')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" name="prenom" value={{ $praticien->prenom }} />

                @error('prenom')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" class="form-control" name="adresse" value={{ $praticien->adresse }} />

                @error('adresse')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="ville">Ville:</label>
                <input type="text" class="form-control" name="ville" value={{ $praticien->ville }} />

                @error('ville')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="codePostal">Code postal:</label>
                <input type="text" class="form-control" name="codePostal" value={{ $praticien->codePostal }} />

                @error('codePostal')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="etatCivil">Etat civil:</label>
                <input type="text" class="form-control" name="etatCivil" value={{ $praticien->etatCivil }} />

                @error('etatCivil')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="origine">Origine:</label>
                <input type="text" class="form-control" name="origine" value={{ $praticien->origine }} />

                @error('origine')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="influence">Influence:</label>
                <input type="number" class="form-control" name="influence" value={{ $praticien->influence }}  />

                @error('influence')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="entourage">Entourage:</label>
                <input type="text" class="form-control" name="entourage" value={{ $praticien->entourage }} />

                @error('entourage')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="diplome">Diplome:</label>
                <input type="text" class="form-control" name="diplome" value={{ $praticien->diplome }} />

                @error('diplome')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="coefficientPrescription">Coefficient de prescription:</label>
                <input type="text" class="form-control" name="coefficientPrescription" value={{ $praticien->coefficientPrescription }} />

                @error('coefficientPrescription')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </form>
    </div>
</div>
@endsection
