<?php

namespace App\Http\Controllers;

use App\Activite;
use Illuminate\Http\Request;

class ActiviteController extends Controller {
    
    /**
     * Liste des activités
     *
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function list(){

        $activites = Activite::all();
        return view('activite.list', ['activites' => $activites]);
    }

    /**
     * Page de création d'une nouvelle activité
     *
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function create(){

        $visiteurMedicaux = \App\VisiteurMedical::all();
        return view('activite.create', ['visiteurMedicaux' => $visiteurMedicaux]);
    }

    /**
     * Enrengistrement d'une nouvelle activité
     *
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validation($request);

        $activite = new Activite([
            'date' => $request->get('date'),
            'salle' => $request->get('salle'),
            'theme' => $request->get('theme'),
            'idVisiteurMedical' => $request->get('visiteurMedical'),
            'numeroAccord' => $request->get('numeroAccord'),
            'budget' => $request->get('budget')
        ]);

        $activite->save();
        
        return redirect('/activite')->with('success', 'L\'activité à bien été ajouté.');
    }

    /**
     * Page d'édition d'une activité
     *
     * @param integer $id
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function edit(int $id){
        
        $activite = Activite::find($id);
        if($activite->numeroAccord != null) return redirect('/activite')->with('success', 'L\'activité ne peut plus être modifié après l\'accord du responsable de région.');

        $visiteurMedicaux = \App\VisiteurMedical::all();
        return view('activite.edit', ['activite' => $activite, 'visiteurMedicaux' => $visiteurMedicaux]);
    }

    /**
     * Mise à jour des données d'une activité
     *
     * @param Request $request
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $id){

        $this->validation($request);

        $activite = Activite::find($id);
        $activite->date = $request->get('date');
        $activite->salle = $request->get('salle');
        $activite->theme = $request->get('theme');
        $activite->idVisiteurMedical = $request->get('visiteurMedical');
        $activite->numeroAccord = $request->get('numeroAccord');
        $activite->budget = $request->get('budget');

        $activite->save();
        return redirect('/activite')->with('success', 'L\'activite à bien été mis à jour.');
    }

    /**
     * Information spécifique d'une activité complémentaire
     *  - Liste des praticiens
     *  - Bilan / Compte rendu
     *
     * @param integer $id
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function item(int $id){

        $activite = Activite::find($id);
        $praticiens_invited = $activite->praticiens;

        $praticiens = \App\Praticien::whereNotIn('idPraticien', $praticiens_invited->pluck('idPraticien'))->get();

        return view('activite.item', [
            'activite' => $activite,
            'praticiens_invited' => $praticiens_invited,
            'praticiens' => $praticiens]);
    }

    /**
     * Ajout d'un praticien invité d'une activite
     *
     * @param Request $request
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function praticien(Request $request, int $id){
        
        $activite = Activite::find($id);
        $activite->praticiens()->attach($request->get('praticien'));

        return redirect()->route('activite.item', $id);
    }

    /**
     * Validation générale d'une activite
     *
     * @param Request $request
     * @return void
     */
    private function validation(Request $request){
        $request->validate([
            'date' => 'required|date',
            'salle' => 'required|string',
            'theme' => 'required|string',
            'visiteurMedical' => 'required|int',
            'numeroAccord' => 'sometimes|nullable|string',
            'budget' => 'sometimes|nullable|numeric'
        ]);
    }

}
