@extends('layouts.app')

@section('content')
<div class="container">

    <div class="page-actions">
        <a class="btn btn-primary" href="{{ route('praticien.create')}}" role="button">Ajouter un praticien</a>
    </div>

    <div class="table-filter">
        <input class="form-control" type="text" placeholder="Recherche" filter>
    </div>

    <div class="card">
        <div class="card-header">Liste des praticiens</div>

           <table class="table table-action table-striped" actionCol="8">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Code postal</th>
                        <th>Etat civil</th>
                        <th>Origine</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody>
                    @foreach($praticiens as $praticien)
                        <tr>
                            <td>{{$praticien->idPraticien}}</td>
                            <td>{{$praticien->nom}}</td>
                            <td>{{$praticien->prenom}}</td>
                            <td>{{$praticien->adresse}}</td>
                            <td>{{$praticien->ville}}</td>
                            <td>{{$praticien->codePostal}}</td>
                            <td>{{$praticien->etatCivil}}</td>
                            <td>{{$praticien->origine}}</td>
                            <td>
                                <a href="{{ route('praticien.edit', $praticien->idPraticien)}}" class="btn btn-primary">Modifier</a>
                                <form action="{{ route('praticien.destroy', $praticien->idPraticien)}}" method="post">
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
