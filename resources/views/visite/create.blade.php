@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        
        <div class="card-header">Création d'une visite</div>

        <form method="post" class="card-body" action="{{ route('visite.store') }}">
            @method('POST')
            @csrf

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" />

                @error('date')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="visiteurMedical">Visiteur médical:</label>
                <select class="form-control" name="visiteurMedical">
                    @foreach($visiteurMedicaux as $visiteur)
                        <option value="{{ $visiteur->idVisiteurMedical }}">{{ $visiteur->nom }} {{ $visiteur->prenom }}</option>
                    @endForeach
                </select>

                @error('visiteurMedical')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="praticien">Praticien:</label>
                <select class="form-control" name="praticien" >
                    @foreach($praticiens as $praticien)
                        <option value="{{ $praticien->idPraticien }}">{{ $praticien->nom }} {{ $praticien->prenom }}</option>
                    @endForeach
                </select>

                @error('praticien')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
    </div>
</div>
@endsection
