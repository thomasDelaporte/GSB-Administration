@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        
        <div class="card-header">Modification visite : {{ $activite->idActivite }}</div>

        <form method="post" class="card-body" action="{{ route('activite.update', $activite->idActivite) }}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" value={{ $activite->date }} />

                @error('date')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="theme">Thème:</label>
                <input type="text" class="form-control" name="theme" value={{ $activite->theme }} />

                @error('theme')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="salle">Salle:</label>
                <input type="theme" class="form-control" name="salle" value={{ $activite->salle }} />

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
                        <option value="{{ $visiteur->idVisiteurMedical }}" @if($visiteur->idVisiteurMedical == $visiteur->idVisiteurMedical) selected @endif >{{ $visiteur->nom }} {{ $visiteur->prenom }}</option>
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
                <input type="text" class="form-control" name="numeroAccord" value="{{ $activite->numeroAccord }}" />

                @error('numeroAccord')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="budget">Budget:</label>
                <input type="number" step="10" class="form-control" name="budget" value={{ $activite->budget }} />

                @error('budget')
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
