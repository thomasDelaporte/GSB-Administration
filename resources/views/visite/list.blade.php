@extends('layouts.app')

@section('content')
<div class="container">

    <div class="page-actions">
        <a class="btn btn-primary" href="{{ route('visite.create')}}" role="button">Ajouter une visite</a>
    </div>

    <div class="table-filter">
        <input class="form-control" type="text" placeholder="Recherche" filter>
    </div>

    <div>
        <div class="card">
            <div class="card-header">Liste des visites</div>

            <table class="table table-action table-striped" actionCol="4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Visiteur</th>
                        <th>Praticien</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visites as $visite)
                        <tr @if($visite->dateFin != null) data-href="{{ route('visite.item', $visite->idVisite) }}" class="finish" @endif>
                            <td>{{$visite->idVisite}}</td>
                            <td>{{$visite->date}}</td>
                            <td>{{$visite->visiteurMedical->nom}}</td>
                            <td>{{$visite->praticien->nom}}</td>
                            <td>
                                <a href="{{ route('visite.edit', $visite->idVisite)}}" class="btn btn-primary">Modifier</a>
                                <form action="{{ route('visite.destroy', $visite->idVisite)}}" method="post">
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
</div>
@endsection
