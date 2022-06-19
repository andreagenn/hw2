<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Utente;


class ControllerAccount extends Controller {

    public function logout(){
        Session::flush();
        return redirect('login');
         
    }

    public function index(){

        $username=session('username');

        if(!isset($username)){
            return redirect('login');
        } else {
            $user=Utente::where('username',$username)->first();

            return view('account')
                ->with('user', $user);
        }
    }

}


?>