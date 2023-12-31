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
@foreach ($reservations as $reservation)
<ul class="list-group">
    <li class="list-group-item d-center d-flex justify-content-between align-items-center">
        Nombre de Place réservé:  <span class="badge bg-primary rounded-pill">{{ $reservation->nombrePlace}}</span>
        <form action="/decliner/{{ $reservation->id }}" method="post">
             @csrf
            @method('patch')
            <button type="submit" class="btn btn-danger m-1">Décliner</button>
        </form>
    </li>
@endforeach
    @endsection()