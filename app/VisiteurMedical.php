<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisiteurMedical extends Model {
    
    protected $table = 'personnelVisiteurs';
    protected $primaryKey = 'idVisiteurMedical';

    public $timestamps = false;

    protected $guarded = [];
    
}
