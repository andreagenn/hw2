<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Utente extends Model {

    protected $table='utenti';

    protected $primaryKey='username';
    protected $autoIncrement=false;
    protected $keyType ='string';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'email',
        'nome',
        'cognome'
    ];

    public function esercizi(){
        return $this->belongsToMany("App\Models\Esercizi");
    }


}

?>