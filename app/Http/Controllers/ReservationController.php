<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Evenement;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\GererNotification;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.reservation');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
       
            $request->validate([
                'nombrePlace' => 'required',
                
            ]);
            
    
            $reservation = new Reservation();
            $reservation->nombrePlace= $request->get('nombrePlace'); 
            $reservation->client_id = Auth::user()->id;
            $even = Evenement::where('association_id', '=', Auth::user()->id)->first();
            // dd($asso);
            $reservation->evenement_id =  $even->id;
            if($reservation->save()){
                $Email= Client::where('id', '=', Auth::user()->id)->first();
                $Email->notify(new GererNotification());
                return Redirect::to('/')->with('status', 'réservation réussie');
            }
           
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
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        
            $reservation = Reservation::findOrFail($id);
            $reservation->statut = 'refusée';
            $reservation->update();
            return back()->with('succes', 'Reservation effectuée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
