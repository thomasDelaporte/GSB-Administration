@extends('layouts.app')

@section('content')
<div class="container">

    <div class="page-actions">
        <a class="btn btn-primary" href="{{ route('activite.create')}}" role="button">Ajouter une activité</a>
    </div>

    <div class="table-filter">
        <input class="form-control" type="text" placeholder="Recherche" filter>
    </div>

    <div class="card">
        <div class="card-header">Liste des activités</div>

           <table class="table table-action table-striped" actionCol="5">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Theme</th>
                        <th>Salle</th>
                        <th>Responsable</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody>
                    @foreach($activites as $activite)
                        <tr @if($activite->numeroAccord != null) data-href="{{ route('activite.item', $activite->idActivite) }}" @endif>
                            <td>{{$activite->idActivite}}</td>
                            <td>{{$activite->date}}</td>
                            <td>{{$activite->theme}}</td>
                            <td>{{$activite->salle}}</td>
                            <td>{{$activite->visiteurMedical->nom}}</td>
                            <td><a href="{{ route('activite.edit', $activite->idActivite)}}" class="btn btn-primary">Modifier</a></td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
