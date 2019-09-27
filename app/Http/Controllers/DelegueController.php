<?php

namespace App\Http\Controllers;

use App\Delegue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DelegueController extends Controller {

    /**
     * Liste des délégués
     *
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function list(){

        $delegues = Delegue::all();
        return view('delegue.list', ['delegues' => $delegues]);
    }

    /**
     * Page de création d'un nouveau délégué
     *
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function create(){
        return view('delegue.create');
    }

    /**
     * Enregistrement d'un nouveau délégué
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request){

        $this->validation($request, [
            'motdepasse' => 'required|string',
            'email' => 'required|unique:personnels|string']);

        $delegue = new Delegue([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'adresse' => $request->get('adresse'),
            'ville' => $request->get('ville'),
            'codePostal' => $request->get('codePostal'),

            'email' => $request->get('email'),
            'motdepasse' => Hash::make($request->get('motdepasse')),

            'salaire' => $request->get('salaire'),
        ]);

        $delegue->save();
        
        return redirect('/delegue')->with('success', 'Le delegue à bien été ajouté.');
    }

    /**
     * Page d'édition d'un délégué
     *
     * @param integer $id
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function edit(int $id){
        
        $delegue = Delegue::find($id);
        return view('delegue.edit', ['delegue' => $delegue]);
    }

    /**
     * Mise à jour des données d'un délégué
     *
     * @param Request $request
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $id){

        $this->validation($request, [
            'motdepasse' => 'sometimes|nullable|string',
            'email' => 'required|email|unique:personnels,email,' . $id .',idPersonnel'
        ]);

        $delegue = Delegue::find($id);
        $delegue->nom = $request->get('nom');
        $delegue->prenom = $request->get('prenom');
        $delegue->adresse = $request->get('adresse');
        $delegue->ville = $request->get('ville');
        $delegue->codePostal = $request->get('codePostal');

        $delegue->email = $request->get('email');
        if($request->has('motdepasse'))
            $delegue->motdepasse = Hash::make($request->get('motdepasse'));

        $delegue->salaire = $request->get('salaire');

        $delegue->save();
        
        return redirect('/delegue')->with('success', 'Le delegue à bien été mis à jour.');
    }

    /**
     * Suppression d'un délégué
     *
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function destroy(int $id){

        $delegue = Delegue::find($id);
        $delegue->delete();

        return redirect('/delegue')->with('success', 'Le delegue à bien été supprimé.');
    }

    /**
     * Validation générale d'un delegue
     *
     * @param Request $request
     * @param array $option
     * @return void
     */
    private function validation(Request $request, array $option = []){
        $request->validate(array_merge([
            'nom'=>'required|string',
            'prenom'=> 'required|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'codePostal' => 'required|postal_code:FR',
            
            'salaire' => 'required|numeric'
        ], $option));
    }
}
