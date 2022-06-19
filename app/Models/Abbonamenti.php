<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Abbonamenti extends Model {

    protected $table='abbonamenti';

    protected $primaryKey='titolo';
    protected $autoIncrement=false;
    protected $keyType ='string';

    
    public $timestamps = false;

    protected $fillable = [
        'titolo',
        'immagine'
    ];


}

?>