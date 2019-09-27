@extends('layouts.app')

@section('content')
<div class="container">

    <div class="page-actions">
        <a class="btn btn-primary" href="{{ route('delegue.create')}}" role="button">Ajouter un délégué</a>
    </div>

    <div class="table-filter">
        <input class="form-control" type="text" placeholder="Recherche" filter>
    </div>

    <div class="card">
        <div class="card-header">Liste des délégués</div>

           <table class="table table-action table-striped" actionCol="8">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Code postal</th>
                        <th>Salaire</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody>
                    @foreach($delegues as $delegue)
                        <tr>
                            <td>{{$delegue->idDelegue}}</td>
                            <td>{{$delegue->matriculePersonnel}}</td>
                            <td>{{$delegue->nom}}</td>
                            <td>{{$delegue->prenom}}</td>
                            <td>{{$delegue->adresse}}</td>
                            <td>{{$delegue->ville}}</td>
                            <td>{{$delegue->codePostal}}</td>
                            <td>{{$delegue->salaire}}</td>
                            <td>
                                <a href="{{ route('delegue.edit', $delegue->idDelegue)}}" class="btn btn-primary">Modifier</a>
                                <form action="{{ route('delegue.destroy', $delegue->idDelegue)}}" method="post">
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
