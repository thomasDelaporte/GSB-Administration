<?php

namespace App\Http\Controllers;

use App\Composant;
use Illuminate\Http\Request;

class ComposantController extends Controller {
    
    /**
     * Liste des composants
     *
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function list(){

        $composants = Composant::all();
        return view('composant.list', ['composants' => $composants]);
    }
    
    /**
     * Enrengistrement d'un nouveau composant
     *
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validation($request);

        $composant = new Composant([
            'labelComposant' => $request->get('labelComposant'),
        ]);

        $composant->save();
        
        return redirect('/composant')->with('success', 'Le composant à bien été ajouté.');
    }

    /**
     * Page d'édition d'un composant
     *
     * @param integer $id
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function edit(int $id){
        
        $composant = Composant::find($id);
        return view('composant.edit', ['composant' => $composant]);
    }

    /**
     * Mise à jour des données d'un composant
     *
     * @param Request $request
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $id){

        $this->validation($request);

        $composant = Composant::find($id);
        $composant->labelComposant = $request->get('labelComposant');

        $composant->save();
        
        return redirect('/composant')->with('success', 'Le composant à bien été mis à jour.');
    }

    /**
     * Suppression d'un composant
     *
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function destroy(int $id){

        $composant = Composant::find($id);
        $composant->delete();

        return redirect('/composant')->with('success', 'Le composant à bien été supprimé.');
    }

    /**
     * Validation générale d'un composant
     *
     * @param Request $request
     * @return void
     */
    private function validation(Request $request){
        $request->validate([
            'labelComposant' => 'required|string'
        ]);
    }
}
