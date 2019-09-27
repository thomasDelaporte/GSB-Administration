@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="card" style="margin-bottom: 30px">
        
        <div class="card-header">Ajout d'une région</div>

        <form method="post" class="card-body" action="{{ route('region.store') }}">
            @method('POST')
            @csrf

            <div class="form-group">
                <label for="labelRegion">Label région:</label>
                <input type="text" class="form-control" name="labelRegion" />

                @error('labelRegion')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="budgetAnnuel">Budget annuel:</label>
                <input type="text" class="form-control" name="budgetAnnuel" />

                @error('budgetAnnuel')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
    </div>

    <div class="table-filter">
        <input class="form-control" type="text" placeholder="Recherche" filter>
    </div>

    <div class="card">
        <div class="card-header">Liste des régions</div>

           <table class="table table-action table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Label</td>
                        <td>Budget annuel</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                 <tbody>
                    @foreach($regions as $region)
                        <tr>
                            <td>{{$region->idRegion}}</td>
                            <td>{{$region->labelRegion}}</td>
                            <td>{{$region->budgetAnnuel}}</td>
                            <td>
                                <a href="{{ route('region.edit', $region->idRegion)}}" class="btn btn-primary">Modifier</a>
                                <form action="{{ route('region.destroy', $region->idRegion)}}" method="post">
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
