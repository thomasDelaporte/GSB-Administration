<?php

namespace App\Http\Controllers;

use App\Indication;
use Illuminate\Http\Request;

class IndicationController extends Controller {

    /**
     * Liste des indications
     *
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function list(){

        $indications = Indication::all();
        return view('indication.list', ['indications' => $indications]);
    }

    /**
     * Enrengistrement d'une nouvelle indication
     *
     * @param Request $request
     * @return Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validation($request);

        $indication = new Indication([
            'labelIndication' => $request->get('labelIndication'),
            'typeIndication' => $request->get('typeIndication')
        ]);

        $indication->save();
        
        return redirect('/indication')->with('success', 'L\'indication à bien été ajouté.');
    }

    /**
     * Page d'édition d'une indication
     *
     * @param integer $id
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function edit(int $id){
        
        $indication = Indication::find($id);
        return view('indication.edit', ['indication' => $indication]);
    }

    /**
     * Mise à jour des données d'une indication
     *
     * @param Request $request
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, int $id){

        $this->validation($request);

        $indication = Indication::find($id);
        $indication->labelIndication = $request->get('labelIndication');
        $indication->typeIndication = $request->get('typeIndication');

        $indication->save();
        
        return redirect('/indication')->with('success', 'L\'indication à bien été mis à jour.');
    }

    /**
     * Suppression d'une indication
     *
     * @param integer $id
     * @return Illuminate\Http\Response
     */
    public function destroy(int $id){

        $indication = Indication::find($id);
        $indication->delete();

        return redirect('/indication')->with('success', 'L\'indication à bien été supprimé.');
    }

    /**
     * Validation générale d'une indication
     *
     * @param Request $request
     * @return void
     */
    private function validation(Request $request){
        $request->validate([
            'labelIndication' => 'required|string',
            'typeIndication' => 'required|int'
        ]);
    }
}
