<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('association.ajoutEvenement');              
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'libelle' => 'required',
            'description' => 'required',
            'image_mise_en_avant' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'date_limite_inscription' => 'required',
            'statut' => 'required',
            'date_evenement' => 'required', 
            
        ]);
        // dd($request);
        $imagePath = $request->file('image_mise_en_avant')->store('images/evenement', 'public');

        $evenement = new Evenement();
        $evenement->libelle = $request->get('libelle');
        $evenement->description = $request->get('description');
        $evenement->image_mise_en_avant = $imagePath;
        $evenement->date_limite_inscription = $request->get('date_limite_inscription');
        $evenement->statut = $request->get('statut');
        $evenement->date_evenement = $request->get('date_evenement');
        
        $evenement->association_id = Auth::user()->id;

        $evenement->save();
        return Redirect::to('/dashboard')->with('status', 'Evenement enregistré  avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evenement $evenement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenement $evenement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evenement $evenement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evenement $evenement)
    {
        //
    }
}
