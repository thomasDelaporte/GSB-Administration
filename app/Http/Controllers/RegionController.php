<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;

class RegionController extends Controller {

    /**
     * Liste des régions
     *
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function list(){

        $regions = Region::all();
        return view('region.list', ['regions' => $regions]);
    }

    /**
     * Enrengistrement d'une nouvelle région
     *
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validation($request);

        $region = new Region([
            'labelRegion' => $request->get('labelRegion'),
            'budgetAnnuel' => $request->get('budgetAnnuel')
        ]);

        $region->save();
        
        return redirect('/region')->with('success', 'La region à bien été ajouté.');
    }

    /**
     * Page d'édition d'une région
     *
     * @param integer $id
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function edit(int $id){
        
        $region = region::find($id);
        if($region === null) return redirect('/region')->with('success', 'Aucune région existe avec ces paramètres.');

        return view('region.edit', ['region' => $region]);
    }

    /**
     * Mise à jour des données d'une région
     *
     * @param Request $request
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $id){

        $this->validation($request);

        $region = Region::find($id);
        $region->labelRegion = $request->get('labelRegion');
        $region->budgetAnnuel = $request->get('budgetAnnuel');

        $region->save();
        
        return redirect('/region')->with('success', 'La region à bien été mis à jour.');
    }

    /**
     * Suppression d'une région
     *
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function destroy(int $id){

        $region = Region::find($id);
        $region->delete();

        return redirect('/region')->with('success', 'La region à bien été supprimé.');
    }

    /**
     * Validation générale d'une région
     *
     * @param Request $request
     * @return void
     */
    private function validation(Request $request){
        $request->validate([
            'labelRegion' => 'required|string',
            'budgetAnnuel' => 'required|numeric'
        ]);
    }
}
