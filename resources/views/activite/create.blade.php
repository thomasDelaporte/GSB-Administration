@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        
        <div class="card-header">Création d'une activité</div>

        <form method="post" class="card-body" action="{{ route('activite.store') }}">
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
                <label for="theme">Thème:</label>
                <input type="text" class="form-control" name="theme" />

                @error('theme')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="salle">Salle:</label>
                <input type="theme" class="form-control" name="salle" />

                @error('salle')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            

            <div class="form-group">
                <label for="visiteurMedical">Responsable:</label>
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
                <label for="numeroAccord">Numero d'accord:</label>
                <input type="text" class="form-control" name="numeroAccord" />

                @error('numeroAccord')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="budget">Budget:</label>
                <input type="number" step="10" class="form-control" name="budget" />

                @error('budget')
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
