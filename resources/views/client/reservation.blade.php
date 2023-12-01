@extends('welcome')

@section('content')
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

<form action="/faireReservation/{id}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <fieldset>
      <legend>Faire une réservation</legend>
    
      <div class="form-group">
        <label  class="form-label mt-4">Nombre de Place</label>
        <input type="number" class="form-control" name="nombrePlace">
      </div>
        <br>
      <button type="submit" class="btn btn-primary">Soumettre</button>
    </fieldset>
  </form>




@endsection()











