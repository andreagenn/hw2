<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;


class ControllerCalorie extends Controller {

    
    public function index(){

        $username=session('username');

        if(!isset($username)){
            return redirect('login');
        } else {
            return view('calorie');
        }
    }
    
    public function alimento($query){
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://food-calorie-data-search.p.rapidapi.com/api/search?keyword=" .$query,
            CURLOPT_RETURNTRANSFER => true,
	        CURLOPT_FOLLOWLOCATION => true,
	        CURLOPT_ENCODING => "",
	        CURLOPT_MAXREDIRS => 10,
	        CURLOPT_TIMEOUT => 30,
	        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	        CURLOPT_CUSTOMREQUEST => "GET",
	        CURLOPT_HTTPHEADER => [
		    "X-RapidAPI-Host: food-calorie-data-search.p.rapidapi.com",
		    "X-RapidAPI-Key: 27eb10cde7mshcaf4542e4f0e9a2p165667jsn604c225b7208"
	        ],
    ]);
    
    
        $risultato=curl_exec($curl);

        curl_close($curl);

        return $risultato;
    }

}


?>