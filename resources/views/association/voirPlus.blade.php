@extends('welcome')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <img src="{{asset('storage/'. $evenement->image_mise_en_avant) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $evenement->libelle }}</h5>
                <p class="card-text">{{ $evenement->description }}</p>
                <p><b>Statut:</b> {{$evenement->statut}}</p>
                <p><b>Date de L'évènement:</b> {{$evenement->date_evenement}}</p>
                <p><b>Date Limite Inscription:</b> {{$evenement->date_limite_inscription}}</p>
            </div>
        </div>
    </div>
</div>


    @endsection()