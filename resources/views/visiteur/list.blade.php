@extends('layouts.app')

@section('content')
<div class="container">

    <div class="page-actions">
        <a class="btn btn-primary" href="{{ route('visiteur.create')}}" role="button">Ajouter un visiteur médicale</a>
    </div>

    <div class="table-filter">
        <input class="form-control" type="text" placeholder="Recherche" filter>
    </div>

    <div class="card">
        <div class="card-header">Liste des visiteurs médicaux</div>

           <table class="table table-action table-striped" actionCol="7">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Matricule</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody>
                    @foreach($visiteurs as $visiteur)
                        <tr>
                            <td>{{$visiteur->idVisiteurMedical}}</td>
                            <td>{{$visiteur->matriculePersonnel}}</td>
                            <td>{{$visiteur->nom}}</td>
                            <td>{{$visiteur->prenom}}</td>
                            <td>{{$visiteur->email}}</td>
                            <td>{{$visiteur->adresse}}</td>
                            <td>{{$visiteur->ville}}</td>
                            <td>
                                <a href="{{ route('visiteur.edit', $visiteur->idVisiteurMedical)}}" class="btn btn-primary">Modifier</a>
                                <form action="{{ route('visiteur.destroy', $visiteur->idVisiteurMedical)}}" method="post">
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
