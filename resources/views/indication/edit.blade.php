@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        
        <div class="card-header">Modification de l'indication : {{ $indication->idIndication }}</div>

        <form method="post" class="card-body" action="{{ route('indication.update', $indication->idIndication) }}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="labelIndication">Label:</label>
                <input type="text" class="form-control" name="labelIndication" value={{ $indication->labelIndication }} />

                @error('labelIndication')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="typeIndication">Type d'indication:</label>
                <select class="form-control" name="typeIndication">
                    <option value="0" @if($indication->typeIndication == 0 ) selected @endif>Indication</option>
                    <option value="1" @if($indication->typeIndication == 1 ) selected @endif>Contre-indication</option>
                </select>

                @error('typeIndication')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
      </form>
    </div>
</div>
@endsection
