<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Utente;
use App\Models\Abbonamenti;


class ControllerHomepage extends Controller {

    
    public function index(){

        $username=session('username');

        if(!isset($username)){
            return redirect('login');
        } else {
            return view('homepage');
        }
    }

    public function inizializza(){
        return Abbonamenti::all();       
    }

    public function inserisciAbbonamento($abbonamento){
        $username=session('username');
        $user=Utente::where('username', $username)->first();
        $user->abbonamento=$abbonamento;
        $user->save();
        return 'ok';

    }

}


?>