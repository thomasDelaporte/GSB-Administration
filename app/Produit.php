<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model {
    
    protected $primaryKey = 'idProduit';

    public $timestamps = false;

    protected $guarded = [];

    public function composants(){
        return $this->belongsToMany('App\Composant', 'produitComposants', 'idProduit', 'idComposant')
            ->withPivot('quantite', 'idComposition');
    }

    public function indications(){
        return $this->belongsToMany('App\Indication', 'produitIndications', 'idProduit', 'idIndication');
    }
}
