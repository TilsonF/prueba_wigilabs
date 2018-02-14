<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

class usuariosController extends Controller
{


	function inicio(){
		if(session('token') != ''){
    		return redirect('/dashboard');
    	}else{
    		return view('login');
    	}
	}

	function salir(){
		if(session('token') != ''){
    		session()->flush();
    		return redirect('/');
    	}else{
    		return view('login');
    	}
	}

    function login(Request $request){

    	
    		$client = new Client();
	    	$headers = [
			    
			    'Content-type' => 'application/json',
			    
			];

	    	$dataUser = [
			    'data' => [
			       'usuario' => "$request->usuario",
			        'clave' => $request->clave,
			    ]
			];
			
			$response = $client->post('https://api-zironet.c9users.io/web/v1/login.json', [
	    				'headers' => $headers,
	    				'json' => $dataUser
			]);

			$code = $response->getStatusCode();
			
			$body = $response->getBody();
			$body = json_decode($body, true);
			$error = $body['error'];
			if($error == 0){
				session(['token' => $body['response']['token']]);

				return redirect('/dashboard');
			}else{
				return view('login');
			}
    	

    	

    }



    function dashboard(){

    	$client = new Client();
    	$headers = [
		    
		    'Content-type' => 'application/json',
		    'x-api-key' => session('token')
		    
		];

		$response = $client->get('https://api-zironet.c9users.io/web/v1/alertas.json', [
    				'headers' => $headers
		]);

		$code = $response->getStatusCode();
		
		$body = $response->getBody();
		$body = json_decode($body, true);
		$error = $body['error'];
		if($error == 0){
			
			$data = [
				"alertas" => $body,
				"sesion" => session('token')
			];

			return view('dashboard', $data);
		}else{
			return view('login');
		}


    	
    }
}
