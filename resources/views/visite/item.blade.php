@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <div class="card">

                <div class="card-header">Visite : {{ $visite->idVisite }}</div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" name="date" value={{ $visite->date }} readonly />
                    </div>

                    <div class="form-group">
                        <label for="date">Date fin:</label>
                        <input type="date" class="form-control" name="dateFin" value={{ $visite->dateFin }} readonly />
                    </div>

                    <div class="form-group">
                        <label for="visiteur">Visiteur:</label>
                        <input type="text" class="form-control" name="visiteur" value="{{ $visite->visiteurMedical->nom }} {{ $visite->visiteurMedical->prenom }}" readonly />
                    </div>

                    <div class="form-group">
                        <label for="praticien">Praticien:</label>
                        <input type="text" class="form-control" name="praticien" value="{{ $visite->praticien->nom }} {{ $visite->praticien->prenom }}" readonly />
                    </div>

                    <div class="form-group">
                        <label for="praticien">Motif:</label>
                        <textarea class="form-control" name="praticien" readonly>{{ $visite->motif }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="praticien">Bilan:</label>
                        <textarea class="form-control" name="praticien" readonly>{{ $visite->bilan }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm">
            <div class="card">

                <div class="card-header">Produit présentés</div>

                <table class="card-body table table-striped">
                    <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Quantité</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($visite->produits as $produit)
                            <tr>
                                <td>{{$produit->nomCommercial}}</td>
                                <td>{{$produit->pivot->quantiteEchantillon}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
