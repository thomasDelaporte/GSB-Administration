<?php

namespace App\Http\Controllers;

use App\VisiteurMedical;
use App\Praticien;
use App\Visite;
use Illuminate\Http\Request;

class VisiteController extends Controller {

    /**
     * Liste des visites
     *
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function list(){

        $visites = Visite::all();
        return view('visite.list', ['visites' => $visites]);
    }

    /**
     * Page de création d'une visite
     *
     * @return Illuminate\Http\Response
     */
    public function create(){

        $visiteurMedicaux = VisiteurMedical::all();
        $praticiens = Praticien::all();

        return view('visite.create', [
            'visiteurMedicaux' => $visiteurMedicaux,
            'praticiens' => $praticiens
        ]);
    }

    /**
     * Enrengistrement d'une nouvelle visite
     *
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validation($request, [
            'visiteurMedical' => 'required|int',
            'praticien' => 'required|int']
        );

        $visite = new Visite([
            'date' => $request->get('date'),
            'idVisiteurMedical' => $request->get('visiteurMedical'),
            'idPraticien' => $request->get('praticien')
        ]);

        $visite->save();
        
        return redirect('/visite')->with('success', 'La visite à bien été ajouté.');
    }

    /**
     * Page d'édition d'une visite
     *
     * @param integer $id
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function edit(int $id){
        
        $visite = Visite::find($id);
        if($visite->dateFin != null) return redirect('/visite')->with('success', 'La visite ne peut plus être modifié.');

        return view('visite.edit', ['visite' => $visite]);
    }

    /**
     * Mise à jour des données d'une visite
     *
     * @param Request $request
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $id){

        $this->validation($request);

        $visite = Visite::find($id);
        $visite->date = $request->get('date');

        $visite->save();
        
        return redirect('/visite')->with('success', 'La visite à bien été mis à jour.');
    }

    /**
     * Suppression d'une visite
     *
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function destroy(int $id){

        $visite = Visite::find($id);
        $visite->delete();

        return redirect('/visite')->with('success', 'La visite à bien été supprimé.');
    }

    /**
     * Information spécifique d'une visite
     *  - Liste des produits présentés lors de la visite
     *
     * @param integer $id
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function item(int $id){

        $visite = Visite::find($id);
        if($visite->dateFin == null) return redirect('/visite')->with('success', 'La visite n\'a pas été complété.');
        
        return view('visite.item', ['visite' => $visite]);
    }

    /**
     * Validation générale d'une visite
     *
     * @param Request $request
     * @param array $option
     * @return void
     */
    private function validation(Request $request, array $option = []){
        $request->validate(array_merge([
            'date' => 'required|date'
        ], $option));
    }
}
