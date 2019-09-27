<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Delegue extends Authenticatable {

    use Notifiable;
    
    protected $table = 'personnelDelegues';
    protected $primaryKey = 'idDelegue';

    public $timestamps = false;

    protected $hidden = [
        'motdepasse'
    ];

    protected $guarded = [];

    public function getAuthPassword() {
        return $this->motdepasse;
    }
}
