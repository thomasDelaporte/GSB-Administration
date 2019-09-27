<?php

namespace App\Http\Controllers;

use App\VisiteurMedical;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class VisiteurController extends Controller {
    
    /**
     * Liste de tout les visiteurs médicaux
     *
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function list(){

        $visiteurs = VisiteurMedical::all();
        return view('visiteur.list', ['visiteurs' => $visiteurs]);
    }

    /**
     * Affichage de la page de création d'un visiteur
     * 
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function create(){
        return view('visiteur.create');
    }

    
    /**
     * Enrengistrement d'un nouveau visiteur médical
     *
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validation($request, [
            'motdepasse' => 'required|string', 
            'email' => 'required|unique:personnels|email']);

        $visiteur = new VisiteurMedical([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'adresse' => $request->get('adresse'),
            'ville' => $request->get('ville'),
            'codePostal' => $request->get('codePostal'),

            'email' => $request->get('email'),
            'motdepasse' => Hash::make($request->get('motdepasse')),

            'budget' => $request->get('budget'),
            'avantages' => $request->get('avantages'),
            'prime' => $request->get('prime'),
            'objectif' => $request->get('objectif')
        ]);

        $visiteur->save();
        
        return redirect()->route('visiteur.edit', $visiteur->idVisiteurMedical)->with('success', 'Le visiteur médical à bien été ajouté.');
    }

    /**
     * Affichage de la page de mise à jour d'un visiteur médical à l'aide de son ID
     * 
     * @param integer $id
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function edit(int $id){

        $visiteur = VisiteurMedical::find($id);
        return view('visiteur.edit', ['visiteur' => $visiteur]);
    }

    /**
     * Mise a jour des données d'un visiteur médical
     *
     * @param Request $request
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $id){

        $this->validation($request, [
            'motdepasse' => 'sometimes|nullable|string',
            'email' => 'required|email|unique:personnels,email,' . $id .',idPersonnel']);

        $visiteur = VisiteurMedical::find($id);
        $visiteur->nom = $request->get('nom');
        $visiteur->prenom = $request->get('prenom');
        $visiteur->adresse = $request->get('adresse');
        $visiteur->ville = $request->get('ville');
        $visiteur->codePostal = $request->get('codePostal');

        $visiteur->email = $request->get('email');
        $visiteur->budget = $request->get('budget');

        $visiteur->avantages = $request->get('avantages');
        $visiteur->prime = $request->get('prime');
        $visiteur->objectif = $request->get('objectif');

        if($request->has('motdepasse'))
            $visiteur->motdepasse = Hash::make($request->get('motdepasse'));

        $visiteur->save();
        
        return redirect('/visiteur')->with('success', 'Le visiteur médical à bien été mis à jour.');
    }

    /**
     * Suppresion d'un visiteur médical à l'aide de son ID
     *
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function destroy(int $id){

        $visiteur = VisiteurMedical::find($id);
        $visiteur->delete();

        return redirect('/visiteur')->with('success', 'Le visiteur médical à bien été supprimé.');
    }

    /**
     * Validation générale des visiteurs médical
     *
     * @param Request $request
     * @param array $option
     * @return void
     */
    private function validation(Request $request, array $option = []){
        $request->validate(array_merge([
            'nom'=> 'required|string',
            'prenom'=> 'required|string',
            'adresse' => 'required|string',
            'ville' => 'required|string',
            'codePostal' => 'required|postal_code:FR',
            'budget' => 'required|int',
            'avantages' => 'sometimes|nullable|string',
            'prime' => 'required|numeric',
            'objectif' => 'sometimes|nullable|string'
        ], $option));
    }
}
