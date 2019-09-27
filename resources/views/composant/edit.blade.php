@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        
        <div class="card-header">Modification composant : {{ $composant->idComposant }}</div>

        <form method="post" class="card-body" action="{{ route('composant.update', $composant->idComposant) }}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="labelComposant">Label:</label>
                <input type="text" class="form-control" name="labelComposant" value="{{ $composant->labelComposant }}" />

                @error('labelComposant')
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
