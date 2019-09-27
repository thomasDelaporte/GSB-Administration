<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Praticien extends Model {
    
    protected $table = 'personnePraticiens';
    protected $primaryKey = 'idPraticien';

    public $timestamps = false;

    protected $guarded = [];
}
