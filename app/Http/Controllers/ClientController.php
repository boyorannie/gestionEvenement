<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.inscriptionClient');
    }
    public function index2()
    {
        $evenements = Evenement::all();
        return view('client.liste', compact('evenements'));
    }

    public function afficherListe()
    {
        $evenements = Evenement::all();
        return view('client.listeDefaut', compact('evenements'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       
        $request->validate([
            'prenom' => 'required',
            'telephone' => 'required',
            'accompagnant' => 'required',  
        ]);
        

        $client = new Client();
        $client ->prenom = $request->get('prenom');
        $client ->telephone= $request->get('telephone');
        $client ->accompagnant= $request->get('accompagnant');
        
        $client ->user_id = Auth::user()->id;
        $client ->save();
        $user= User::find(Auth::user()->id);
        $user->var=true;
        $user->update();
        return Redirect::to('/')->with('status', 'inscription réussie');
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
