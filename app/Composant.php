<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Composant extends Model {
    
    protected $primaryKey = 'idComposant';

    public $timestamps = false;

    protected $guarded = [];

}
