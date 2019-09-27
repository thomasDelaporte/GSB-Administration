<?php

namespace App\Http\Controllers;

use App\Praticien;
use Illuminate\Http\Request;

class PraticienController extends Controller {
    
    /**
     * Liste des praticiens
     *
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function list(){

        $praticiens = Praticien::all();
        return view('praticien.list', ['praticiens' => $praticiens]);
    }

    /**
     * Page de création d'un nouveau praticien
     *
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function create(){
        return view('praticien.create');
    }

    /**
     * Enrengistrement d'un nouveau praticien
     *
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validation($request);

        $praticien = new Praticien([
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'adresse' => $request->get('adresse'),
            'ville' => $request->get('ville'),
            'codePostal' => $request->get('codePostal'),
            'etatCivil' => $request->get('etatCivil'),
            'origine' => $request->get('origine'),
            'influence '=> $request->get('influence'),
            'entourage' => $request->get('entourage'),
            'diplome' => $request->get('diplome'),
            'coefficientPrescription' => $request->get('coefficientPrescription')
        ]);

        $praticien->save();
        
        return redirect('/praticien')->with('success', 'Le praticien à bien été ajouté.');
    }

    /**
     * Page d'édition d'un praticien
     *
     * @param integer $id
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function edit(int $id){
        
        $praticien = Praticien::find($id);
        return view('praticien.edit', ['praticien' => $praticien]);
    }

    /**
     * Mise à jour des données d'un praticien
     *
     * @param Request $request
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $id){

        $this->validation($request);

        $praticien = Praticien::find($id);
        $praticien->nom = $request->get('nom');
        $praticien->prenom = $request->get('prenom');
        $praticien->adresse = $request->get('adresse');
        $praticien->ville = $request->get('ville');
        $praticien->codePostal = $request->get('codePostal');

        $praticien->etatCivil = $request->get('etatCivil');
        $praticien->origine = $request->get('origine');
        $praticien->influence = $request->get('influence');
        $praticien->entourage = $request->get('entourage');
        $praticien->diplome = $request->get('diplome');
        $praticien->coefficientPrescription = $request->get('coefficientPrescription');

        $praticien->save();
        
        return redirect('/praticien')->with('success', 'Le praticien à bien été mis à jour.');
    }

    /**
     * Suppression d'un praticien
     *
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function destroy(int $id){

        $praticien = Praticien::find($id);
        $praticien->delete();

        return redirect('/praticien')->with('success', 'Le praticien à bien été supprimé.');
    }

    /**
     * Validation générale d'un praticien
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
            'etatCivil' => 'required|string',
            'origine' => 'required|string',
            'influence' => 'required|int',
            'entourage' => 'required|string',
            'diplome' => 'required|string',
            'coefficientPrescription' => 'required|string'
        ], $option));
    }
}
