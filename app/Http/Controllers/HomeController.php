<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller {
    
    /**
     * Page d'accueil de l'administration
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        $informations = null;

        try{

            $adress = config('app.webservice');
            $client = new \SoapClient($adress, [
                'trace' => 1,
                'exceptions' => 1
            ]);

            $informations = $client->__soapCall('getDelegueById', ['idDelegue' => Auth::id()]);
        } catch(Throwable $ignored){}
        
        return view('home', ['informations' => $informations]);
    }
}
