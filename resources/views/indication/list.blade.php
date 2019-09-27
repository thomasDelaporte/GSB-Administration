@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="card" style="margin-bottom: 30px">
        
        <div class="card-header">Ajouter une indication</div>

        <form method="post" class="card-body" action="{{ route('indication.store') }}">
            @method('POST')
            @csrf

            <div class="form-group">
                <label for="labelIndication">Label:</label>
                <input type="text" class="form-control" name="labelIndication" />

                @error('labelIndication')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="typeIndication">Type d'indication:</label>
                <select class="form-control" name="typeIndication">
                    <option value="0">Indication</option>
                    <option value="1">Contre-indication</option>
                </select>

                @error('typeIndication')
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
        <div class="card-header">Liste des indications</div>

           <table class="table table-action table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Label</td>
                        <td>Type</td>
                        <td>Action</td>
                    </tr>
                </thead>
                 <tbody>
                    @foreach($indications as $indication)
                        <tr>
                            <td>{{$indication->idIndication}}</td>
                            <td>{{$indication->labelIndication}}</td>
                            <td>{{$indication->typeIndication == 0 ? 'Indication' : 'Contre-indication'}}
                            <td>
                                <a href="{{ route('indication.edit', $indication->idIndication)}}" class="btn btn-primary">Modifier</a>
                                <form action="{{ route('indication.destroy', $indication->idIndication)}}" method="post">
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
