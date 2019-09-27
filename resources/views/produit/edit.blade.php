@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style="margin-bottom: 30px;">
        <div class="col-sm">
            <div class="card">

                <div class="card-header">
                    Liste des indications du produit
                    
                    <div class="card-header-actions">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjouterIndication">
                            Ajouter
                        </button>
                    </div>
                </div>

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
                                <td>{{ Str::limit($indication->labelIndication, 30) }}</td>
                                <td>{{$indication->typeIndication == 0 ? 'Indication' : 'Contre-indication'}}</td>
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
        </div>

        <div class="col-sm">
            <div class="card">

                <div class="card-header">
                    Liste des composants du produit
                    
                    <div class="card-header-actions">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAjouterComposant">
                            Ajouter
                        </button>
                    </div>
                </div>

                <table class="card-body table table-striped">
                    <thead>
                        <tr>
                            <td>Label</td>
                            <td>Quantite</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produit->composants as $composant)
                            <tr>
                                <td>{{$composant->labelComposant}}</td>
                                <td>{{$composant->pivot->quantite}}</td>
                                <td>
                                    <form action="{{ route('produit.composant.destroy', [$produit->idProduit, $composant->idComposant])}}" method="post">
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
        </div>
    </div>

    <div class="row">
        <div class="card" style="margin: 0 10px; width: 100%;">
            <div class="card-header">Modification produit : {{ $produit->idProduit }}</div>

            <form method="post" class="card-body" action="{{ route('produit.update', $produit->idProduit) }}">
                @method('PATCH')
                @csrf

                <div class="form-group">
                    <label for="nomCommercial">Nom commercial:</label>
                    <input type="text" class="form-control" name="nomCommercial" value={{ $produit->nomCommercial }} />

                    @error('nomCommercial')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="posologie">Posologie:</label>
                    <input type="number" step="1" pattern="\d+" class="form-control" name="posologie" value={{ $produit->posologie }} />

                    @error('posologie')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="famille">Famille:</label>
                    <input type="text" class="form-control" name="famille" value={{ $produit->famille }} />

                    @error('famille')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="prixUnitaire">Prix unitaire:</label>
                    <input type="number" class="form-control" name="prixUnitaire" value={{ $produit->prixUnitaire }} />

                    @error('prixUnitaire')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="text" class="form-control" name="stock" value={{ $produit->stock }} disabled />

                    @error('stock')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAjouterIndication" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" class="modal-content" action="{{ route('produit.indication', $produit->idProduit) }}">
            @method('POST')
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Ajouter une indication</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label for="indication">Indication:</label>
                    <select class="form-control" name="indication" >
                        @foreach($indications as $indication)
                            <option value="{{ $indication->idIndication }}">{{ $indication->labelIndication }}</option>
                        @endForeach
                    </select>

                    @error('indication')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalAjouterComposant" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" class="modal-content" action="{{ route('produit.composant', $produit->idProduit) }}">
            @method('POST')
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Ajouter un composant</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label for="composant">Composant:</label>
                    <select class="form-control" name="composant" >
                        @foreach($composants as $composant)
                            <option value="{{ $composant->idComposant }}">{{ $composant->labelComposant }}</option>
                        @endForeach
                    </select>

                    @error('composant')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="quantite">Quantite:</label>
                    <input type="number" class="form-control" name="quantite" />

                    @error('quantite')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>
</div>
@endsection
