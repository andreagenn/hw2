<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaEsercizi extends Model {

    protected $table='ListaEsercizi';

    protected $primaryKey='nome';
    protected $autoIncrement=false;
    protected $keyType ='string';

    
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'immagine'
    ];


}

?>