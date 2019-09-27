<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indication extends Model {
    
    protected $primaryKey = 'idIndication';

    public $timestamps = false;

    protected $guarded = [];

}
