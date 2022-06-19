<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Utente;
use App\Models\ListaEsercizi;
use App\Models\Esercizi;


class ControllerRicercaScheda extends Controller {

    
    public function index(){

        $username=session('username');

        if(!isset($username)){
            return redirect('login');
        } else {
            return view('ricerca_scheda');
        }
    }
    
    public function inizializza(){
        return ListaEsercizi::all();       
    }

    public function ricerca_scheda_utente($username){
        $eserciziUtente=Esercizi::where('username', $username)->get();
        if($eserciziUtente===null){
            $ris[]='';
            return $ris;
        } else {
            return $eserciziUtente;
        }
    }

}


?>