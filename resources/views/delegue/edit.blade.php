@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        
        <div class="card-header">Modification delegue : {{ $delegue->idDelegue }}</div>

        <form method="post" class="card-body" action="{{ route('delegue.update', $delegue->idDelegue) }}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" name="nom" value={{ $delegue->nom }} />

                @error('nom')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" name="prenom" value={{ $delegue->prenom }} />

                @error('prenom')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" class="form-control" name="adresse" value="{{ $delegue->adresse }}" />

                @error('adresse')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="ville">Ville:</label>
                <input type="text" class="form-control" name="ville" value={{ $delegue->ville }} />

                @error('ville')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="codePostal">Code postal:</label>
                <input type="text" class="form-control" name="codePostal" value={{ $delegue->codePostal }} />

                @error('codePostal')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value={{ $delegue->email }} />

                @error('email')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="motdepasse">Mot de passe:</label>
                <input type="password" class="form-control" name="motdepasse" />

                @error('motdepasse')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="salaire">Salaire:</label>
                <input type="text" class="form-control" name="salaire" value={{ $delegue->salaire }} />

                @error('salaire')
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
