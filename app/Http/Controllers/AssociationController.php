<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     return view('association.inscription');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nom' => 'required',
            'date_creation' => 'required',
            'slogan' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            
        ]);
        $imagePath = $request->file('logo')->store('images/article', 'public');

        $association = new Association();
        $association->nom = $request->get('nom');
        $association->date_creation = $request->get('date_creation');
        $association->logo = $imagePath;
        $association->slogan= $request->get('slogan');
        

        
        $association->user_id = Auth::user()->id;
        $association->save();
        $user= User::find(Auth::user()->id);
        $user->var=true;
        $user->update();
        return Redirect::to('/dashboard')->with('status', 'inscription réussie');
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
    public function show(Association $association)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Association $association)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Association $association)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Association $association)
    {
        //
    }
}
