@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        
        <div class="card-header">Créaion d'un visiteur médical</div>

        <form method="post" class="card-body" action="{{ route('visiteur.store') }}">
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
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" />

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
                <label for="budget">Budget:</label>
                <input type="text" class="form-control" name="budget" value="0" />

                @error('budget')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="avantages">Avantages:</label>
                <input type="text" class="form-control" name="avantages" />

                @error('avantages')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="prime">Prime:</label>
                <input type="text" class="form-control" name="prime" value="0" />

                @error('prime')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="objectif">Objectif:</label>
                <input type="text" class="form-control" name="objectif" />

                @error('objectif')
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
