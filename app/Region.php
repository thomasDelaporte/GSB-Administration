<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {
    
    protected $primaryKey = 'idRegion';

    public $timestamps = false;

    protected $guarded = [];

}
