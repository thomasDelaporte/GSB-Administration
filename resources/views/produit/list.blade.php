@extends('layouts.app')

@section('content')
<div class="container">

    <div class="page-actions">
        <a class="btn btn-primary" href="{{ route('produit.create')}}" role="button">Ajouter un produit</a>
    </div>

    <div class="table-filter">
        <input class="form-control" type="text" placeholder="Recherche" filter>
    </div>

    <div class="card">
        <div class="card-header">Liste des produits</div>

           <table class="table table-action table-striped" actionCol="6">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Posologie</th>
                        <th>Famille</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody>
                    @foreach($produits as $produit)
                        <tr>
                            <td>{{$produit->idProduit}}</td>
                            <td>{{$produit->nomCommercial}}</td>
                            <td>{{$produit->posologie}}</td>
                            <td>{{$produit->famille}}</td>
                            <td>{{$produit->prixUnitaire}}</td>
                            <td>{{$produit->stock}}</td>
                            <td>
                                <a href="{{ route('produit.edit', $produit->idProduit)}}" class="btn btn-primary">Modifier</a>
                                <form action="{{ route('produit.destroy', $produit->idProduit)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
