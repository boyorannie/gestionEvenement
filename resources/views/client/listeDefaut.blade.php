@extends('welcome')

@section('content')
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row">
    @foreach ($evenements as $evenement)
<div class="card mb-1 col-md-3">

    <h3 class="card-header"></h3>
    <div class="card-body">
  
    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle"> --}}
     
    <img src="{{asset('storage/'. $evenement->image_mise_en_avant) }}" alt=""  width="300" height="200">

   
    
    <div class="card-body">
      <p class="card-text">Description: {{ $evenement->description }}</p>
    </div>
   
    <ul class="list-group list-group-flush">
      <li class="list-group-item">libellé: {{ $evenement->libelle }} </li>
      <li class="list-group-item">Statut: {{ $evenement->statut }} </li>
      <li class="list-group-item">Date de l'évènement:{{ $evenement->date_evenement }}  </li>
      <li class="list-group-item">Date limite:{{ $evenement->date_limite_inscription}}  </li>
    </ul>
    
    </div>
  </div>

  @endforeach()
</div>
  @endsection()