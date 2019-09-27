@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        
        <div class="card-header">Modification region : {{ $region->idRegion }}</div>

        <form method="post" class="card-body" action="{{ route('region.update', $region->idRegion) }}">
            @method('PATCH')
            @csrf

            <div class="form-group">
                <label for="labelRegion">Label région:</label>
                <input type="text" class="form-control" name="labelRegion" value={{ $region->labelRegion }} />

                @error('labelRegion')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="budgetAnnuel">Budget annuel:</label>
                <input type="text" class="form-control" name="budgetAnnuel" value={{ $region->budgetAnnuel }} />

                @error('budgetAnnuel')
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
