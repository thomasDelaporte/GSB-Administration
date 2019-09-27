@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="card" style="margin-bottom: 30px">
        
        <div class="card-header">Création d'un composant</div>

        <form method="post" class="card-body" action="{{ route('composant.store') }}">
            @method('POST')
            @csrf

            <div class="form-group">
                <label for="labelComposant">Label:</label>
                <input type="text" class="form-control" name="labelComposant" />

                @error('labelComposant')
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
        <div class="card-header">Liste des composants</div>

           <table class="table table-action table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Label</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody>
                    @foreach($composants as $composant)
                        <tr>
                            <td>{{$composant->idComposant}}</td>
                            <td>{{$composant->labelComposant}}</td>
                            <td>
                                <a href="{{ route('composant.edit', $composant->idComposant)}}" class="btn btn-primary">Modifier</a>
                                <form action="{{ route('composant.destroy', $composant->idComposant)}}" method="post">
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
