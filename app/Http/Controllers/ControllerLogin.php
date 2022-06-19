<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Utente;


class ControllerLogin extends Controller {

    public function index() {
        if(session('username') != null) {
            return redirect("account");
        }
        else {
            return view('login')
                ->with('csrf_token', csrf_token());
        }
     }

    public function checkLogin(){
        $request=request();

        $user=Utente::where('username', $request->username)
                ->where('password', $request->password)
                ->first();

        if($user !== null){
            Session::put('username', $user->username);
            return redirect('account');
        } else {
            return redirect('login')
                ->withInput();
        }

    }

    public function checkCredenziali($username, $password){
        $exist=Utente::where('username', $username)
            ->where('password', $password)
            ->first();
            
        if($exist===NULL){
            return 'credenziali_sbagliate';
        }else{
            return 'ok';
        }
    }


}

?>