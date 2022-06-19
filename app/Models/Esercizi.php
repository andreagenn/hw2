<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Esercizi extends Model {

    protected $table='schede';

    protected $primaryKey='username';
    protected $autoIncrement=false;
    protected $keyType ='string';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'esercizio'
    ];

    public function utente(){
        return $this->belongsToMany("App\Models\Utente");
    }

}

?>