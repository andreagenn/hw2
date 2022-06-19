<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\Utente;


class ControllerRegistrazione extends Controller {

    public function index(){

        if(session('username') != null) {
            return redirect("account");
        }else {

            $request=request();

            $old_username=$request->username;
            $old_email=$request->email;
            $old_nome=$request->nome;
            $old_cognome=$request->cognome;

            return view('registrazione')
                ->with('old_username',$old_username)
                ->with('old_email',$old_email)
                ->with('old_nome',$old_nome)
                ->with('old_cognome',$old_cognome)
                ->with('csrf_token',csrf_token());
        }
    }

    public function checkUsername($username){
        $exist=Utente::where('username', $username)->first();
        if($exist!==NULL){
            return 'username_utilizzato';
        }else{
            return 'ok';
        }
    }

    public function checkEmail($email){
        $exist=Utente::where('email', $email)->first();
        if($exist!==NULL){
            return 'email_utilizzata';
        }else{
            return 'ok';
        }
    }

    public function createUser(){
        
        $request=request();
        if ($this->countErrors($request)===0){

            
            $newUser=Utente::create([
                'username' => $request['username'],
                'password' => $request['password'],
                'email' => $request['email'],
                'nome' => $request['nome'],
                'cognome' => $request['cognome'],
            ]); 
            
            if($newUser){
                return redirect('login')
                    ->with('ok', 'ok');

            }else {
                return redirect('registrazione')->withInput();
            }
        }else {
            return redirect('registrazione')->withInput();
        }
        
    }

    private function countErrors($data){

        if(!empty($data['username']) && 
            !empty($data['password']) && 
            !empty($data['email']) && 
            !empty($data['nome']) && 
            !empty($data['cognome'])){
    
                $errore = array();
    
                //controllo username
                if(!preg_match('/^[0-9A-Za-z_]{1,15}$/', $data["username"])){
                    $errore[]="Attenzione! Username non valido";
                } else {
                    $username=Utente::where('username', $data['username'])->first();
                    if($username) {
                        $errore[]="Attenzione! Username già in uso!";
                    }
                }
    
                //controllo password
                if (strlen($data["password"])<5 || strlen($data["password"])>15){
                    $errore[]="Attenzione! La password deve contenere tra i 5 e i 15 caratteri.";
                }
    
                //controllo email
                if(!filter_var($data["email"], FILTER_VALIDATE_EMAIL)){
                    $errore[]="Attenzione! Email non valida!";
                }else{
                    $email=Utente::where('email', $data['email'])->first();;
                    if($email) {
                        $errore[]="Attenzione! Email già in uso!";
                    }
                }
    
                //controllo nome e cognome
                if(!preg_match('/^[a-zA-z]{1,15}$/', $data["nome"])){
                    $errore[]="Attenzione! Inserisci un nome valido";
                }
                if(!preg_match('/^[a-zA-z]{1,15}$/', $data["cognome"])){
                    $errore[]="Attenzione! Inserisci un cognome valido";
                }

        } else if (isset($data["username"])) {
            $errore = array("Riempi tutti i campi");
        }

        return count($errore);
    }

    

}


?>