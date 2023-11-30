@extends('welcome')

@section('content')
@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

<form action="/modifierEvenement/{{$evenement->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <fieldset>
      <legend>Modifier Evenement</legend>
    
      <div class="form-group">
        <label  class="form-label mt-4">Libellé</label>
        <input type="text" class="form-control" name="libelle">
      </div>
      <div class="form-group">
        <label class="form-label mt-4">Date limite d'inscription</label>
        <input type="date" class="form-control" name="date_limite_inscription">
      </div>
      <div class="form-group">
        <label class="form-label mt-4">Image</label>
        <input type="file" class="form-control" name="image_mise_en_avant">
      </div>
      <div class="form-group">
        <label class="form-label mt-4">Description</label>
        <input type="text" class="form-control" name="description">
      </div>
      <div class="form-group">
        <label class="form-label mt-4">Statut</label>
      <select class="form-select" name="statut">
        <option>ouvert</option>
        <option>cloturé</option>
      </select>
    </div>
    <div class="form-group">
        <label class="form-label mt-4">Date Evenement</label>
        <input type="date" class="form-control" name="date_evenement">
      </div>
      <br><br>
      <button type="submit" class="btn btn-primary">Modifier</button>
    </fieldset>
  </form>




@endsection()

















