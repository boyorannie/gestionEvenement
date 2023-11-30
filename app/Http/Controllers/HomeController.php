<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $role = Auth::user()->role;
            if ($role == 'association') {
             if(Auth::user()->var==true){
                return Redirect::to('/association/ajoutEvenement');
             }
             return Redirect::to('/association/inscription');
            } 
            else {
                if(Auth::user()->var==true){
                    return Redirect::to('/association/faireReservation');
                }
                return Redirect::to('/client/inscrip');
            
        }
    }
   
}
}
