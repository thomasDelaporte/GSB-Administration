<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visite extends Model {
    
    protected $primaryKey = 'idVisite';

    public $timestamps = false;

    protected $guarded = [];

    public function visiteurMedical(){
        return $this->hasOne('App\VisiteurMedical', 'idVisiteurMedical', 'idVisiteurMedical');
    }

    public function praticien(){
        return $this->hasOne('App\Praticien', 'idPraticien', 'idPraticien');
    }

    public function produits(){
        return $this->belongsToMany('App\Produit', 'visiteProduits', 'idProduit', 'idProduit')->withPivot('quantiteEchantillon');
    }
}
