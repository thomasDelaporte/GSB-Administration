<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model {
    
    protected $primaryKey = 'idActivite';

    protected $guarded = [];

    public $timestamps = false;

    public function visiteurMedical(){
        return $this->hasOne('App\VisiteurMedical', 'idVisiteurMedical', 'idVisiteurMedical');
    }

    public function praticiens(){
        return $this->belongsToMany('App\Praticien', 'activitePraticiens', 'idActivite', 'idPraticien');
    }
}
