@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        
        <div class="card-header">Créaion d'un produit</div>

        <form method="post" class="card-body" action="{{ route('produit.store') }}">
            @method('POST')
            @csrf

            <div class="form-group">
                <label for="nomCommercial">Nom commercial:</label>
                <input type="text" class="form-control" name="nomCommercial" />

                @error('nomCommercial')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="posologie">Posologie:</label>
                <input type="number" step="1" pattern="\d+" class="form-control" name="posologie" />

                @error('posologie')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="famille">Famille:</label>
                <input type="text" class="form-control" name="famille" />

                @error('famille')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="prixUnitaire">Prix unitaire:</label>
                <input type="number" class="form-control" name="prixUnitaire" />

                @error('prixUnitaire')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="text" class="form-control" name="stock" />

                @error('stock')
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
