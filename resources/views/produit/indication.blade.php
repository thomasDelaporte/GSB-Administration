@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="margin-bottom: 30px;">
        
        <div class="card-header">Ajouter une indication</div>

        <form method="post" class="card-body" action="{{ route('produit.storeIndication', $produit->idProduit) }}">
            @method('POST')
            @csrf

            <div class="form-group">
                <label for="indication">Indication:</label>
                <select class="form-control" name="indication">
                    @foreach($indications as $indication)
                        <option value="{{ $indication->idIndication }}">{{ $indication['labelIndication'] }}</option>
                    @endforeach
                </select>

                @error('indication')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>

    <div class="card" style="margin-bottom: 30px;">

        <div class="card-header">Liste des indications du produit</div>

         <table class="card-body table table-striped">
            <thead>
                <tr>
                    <td>Label</td>
                    <td>Type</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($produit->indications as $indication)
                    <tr>
                        <td>{{$indication->indication->labeIndication}}</td>
                        <td>{{$indication->indication->typeIndication}}</td>
                        <td>
                            <form action="{{ route('produit.indication.destroy', [$produit->idProduit, $indication->idIndication])}}" method="post">
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
