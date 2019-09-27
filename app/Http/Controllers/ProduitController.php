<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller {
    
    /**
     * Liste des produits
     *
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function list(){

        $produits = Produit::all();
        return view('produit.list', ['produits' => $produits]);
    }

    /**
     * Page de création d'un produit
     *
     * @param Request $request
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request){
        return view('produit.create');
    }

    /**
     * Enrengistrement d'un nouveau produit
     *
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validation($request, ['stock' => 'required|int']);

        $produit = new Produit([
            'nomCommercial' => $request->get('nomCommercial'),
            'posologie' => $request->get('posologie'),
            'famille' => $request->get('famille'),
            'prixUnitaire' => $request->get('prixUnitaire'),
            'stock' => $request->get('stock')
        ]);

        $produit->save();

        return redirect()->route('produit.composant', $produit->idProduit);
    }

    /**
     * Ajout d'un nouveau composant d'un produit
     *
     * @param Request $request
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function storeComposant(Request $request, int $id){

        $request->validate([
            'composant' => 'required|int',
            'quantite' => 'required|int|min:1'
        ]);

        $produit = Produit::find($id);
        $produit->composants()->attach($request->get('composant'), [
            'quantite' => $request->get('quantite')
        ]);

        return back()->with('success', 'Le composant à bien été ajouté.');
    }

    /**
     * Suppresion d'un composant d'un produit
     *
     * @param integer $idProduit
     * @param integer $idComposant
     * @return Illuminate\Http\Response
     */
    public function composantDestroy(int $idProduit, int $idComposant){
        
        $produit = Produit::find($idProduit);
        $produit->composants()->detach($idComposant);

        return back()->with('success', "Le composant à bien été supprimé du produit $produit->nomCommercial.");
    }

    /**
     * Ajout d'une nouvelle indication/contre-indication d'un produit
     *
     * @param Request $request
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function storeIndication(Request $request, int $id){

        $request->validate([
            'indication' => 'required|int'
        ]);

        $produit = Produit::find($id);
        $produit->indications()->attach($request->get('indication'));

        return back()->with('success', 'L\'indication à bien été ajouté.');
    }

    /**
     * Page d'édition d'un produit
     *
     * @param integer $id
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function edit(int $id){
        
        $produit = Produit::find($id);
        if($produit == null) return redirect()->route('produit.list')->with('success', 'Aucun produit avec cet identifiant.');
        
        $indications = \App\Indication::whereNotIn('idIndication', $produit->indications->pluck('idIndication'))->get();
        $composants = \App\Composant::whereNotIn('idComposant', $produit->composants->pluck('idComposant'))->get();

        return view('produit.edit', [
            'produit' => $produit,
            'indications' => $indications,
            'composants' => $composants
        ]);
    }

    /**
     * Mise à jour des données d'un produit
     *
     * @param Request $request
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $id){

        $this->validation($request);

        $produit = Produit::find($id);
        $produit->nomCommercial = $request->get('nomCommercial');
        $produit->posologie = $request->get('posologie');
        $produit->famille = $request->get('famille');
        $produit->prixUnitaire = $request->get('prixUnitaire');

        $produit->save();
        
        return redirect('/produit')->with('success', 'Le produit à bien été mis à jour.');
    }

    /**
     * Suppression d'un produit
     *
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function destroy(int $id){

        $produit = Produit::find($id);
        $produit->delete();

        return redirect('/produit')->with('success', 'Le produit à bien été supprimé.');
    }

    /**
     * Validation générale d'un produit
     *
     * @param Request $request
     * @param array $option
     * @return void
     */
    private function validation(Request $request, array $option = []){
        $request->validate(array_merge([
            'nomCommercial'=>'required|string',
            'posologie'=> 'required|int',
            'famille' => 'required|string',
            'prixUnitaire' => 'required|numeric'
        ], $option));
    }
}
