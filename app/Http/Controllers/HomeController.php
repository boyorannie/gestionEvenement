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
                return Redirect::to('/association/inscription');
            } 
            else {
                return Redirect::to('/');
            }
        }
    }
}
