@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        
        <div class="card-header">Modification visite : {{ $visite->idVisite }}</div>

        <form method="post" class="card-body" action="{{ route('visite.update', $visite->idVisite) }}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" value={{ $visite->date }} />

                @error('date')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="visiteurMedical">Visiteur médical:</label>
                <input type="text" name="visiteurMedical" class="form-control" value="{{ $visite->visiteurMedical->nom }} {{ $visite->visiteurMedical->prenom }}" disabled>

                @error('visiteurMedical')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="praticien">Praticien:</label>
                <input type="text" name="praticien" class="form-control" value="{{ $visite->praticien->nom }} {{ $visite->praticien->prenom }}" disabled>

                @error('praticien')
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
