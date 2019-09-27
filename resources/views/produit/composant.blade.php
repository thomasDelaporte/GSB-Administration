@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="margin-bottom: 30px;">
        
        <div class="card-header">Ajout d'un composant</div>

        <form method="post" class="card-body" action="{{ route('produit.storeComposant', $produit->idProduit) }}">
            @method('POST')
            @csrf

            <div class="form-group">
                <label for="composant">Composants:</label>
                <select class="form-control" name="composant">
                    @foreach($composants as $composant)
                        <option value={{ $composant->idComposant }}>{{ $composant->labelComposant }}</option>
                    @endforeach
                </select>

                @error('composant')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="quantite">Quantité:</label>
                <input type="number" class="form-control" min="1" name="quantite" placeholder="1" />

                @error('quantite')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <div class="card" style="margin-bottom: 30px;">

        <div class="card-header">Liste des composants</div>

         <table class="card-body table table-striped">
            <thead>
                <tr>
                    <td>Label</td>
                    <td>Quantite</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($produit->composants as $produitComposant)
                    <tr>
                        <td>{{$produitComposant->labelComposant}}</td>
                        <td>{{$produitComposant->pivot->quantite}}</td>
                        <td>
                            <form action="{{ route('produit.composant.destroy', [$produit->idProduit, $produitComposant->idComposant])}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container row">
        <form action="{{ route('produit.create')}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-primary" type="submit">Continuer</button>
        </form>
    </div>
</div>
@endsection
