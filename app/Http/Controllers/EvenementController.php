<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    public function index2()
    {
        $evenements = Evenement::all();
        return view('client.liste', compact('evenements'));
    }

    public function afficherListe()
    {
        $evenements = Evenement::all();
        return view('association.listeEvenement', compact('evenements'));
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
        $asso = Association::where('user_id', '=', Auth::user()->id)->first();
        // dd($asso);
        $evenement->association_id =  $asso->id;

        $evenement->save();
        return Redirect::to('/dashboard')->with('status', 'Evenement enregistré  avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evenement = Evenement::findOrFail($id);
       $reservations= $evenement->reservation()->get();
        return view('association.voirPlus', compact('evenement', 'reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('association.modifierEvenement', compact('evenement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required',
            'description' => 'required',
            'image_mise_en_avant' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'date_limite_inscription' => 'required',
            'statut' => 'required',
            'date_evenement' => 'required', 
            
        ]);
        $evenement = Evenement::findOrFail($id);

        // dd($request);
        if ($request->file('image_mise_en_avant')) {
            Storage::disk('public')->delete($evenement->image_mise_en_avant);

        $imagePath = $request->file('image_mise_en_avant')->store('images/evenement', 'public');
        $evenement->image_mise_en_avant = $imagePath;
    }
      
        $evenement->libelle = $request->get('libelle');
        $evenement->description = $request->get('description'); 
        $evenement->date_limite_inscription = $request->get('date_limite_inscription');
        $evenement->statut = $request->get('statut');
        $evenement->date_evenement = $request->get('date_evenement');
        $evenement->association_id = Auth::user()->id;
        $evenement->update();
        return Redirect::to('/dashboard')->with('status', 'Evenement modifié avec succès');
   
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $evenement = Evenement::findOrFail($id);
        Storage::disk('public')->delete($evenement->image_mise_en_avant);
        $evenement->delete();
        return back()->with('status', 'Evènement supprimé avec succès');
    }
}
