
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription Association</title>
    <!-- Liens vers les fichiers CSS Bootstrap -->
    <link href="https://bootswatch.com/5/lumen/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  @if(count($errors) >0)
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <i class="bi bi-exclamation-octagon me-1"></i>
      @foreach($errors->all() as $error)
      {{$error}}
      @endforeach
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <div class="container py-5 col-sm-6">
    <form action="{{'/association/inscrip'}}" method="POST" enctype="multipart/form-data">
@csrf
      <div class="form-group row m-5 p-5">
        <label  for="name" class="col-sm-2 col-form-label">Nom Association</label>
        <div class="col-sm-10">
          <input type="text" name="nom" >
        </div>
      </div>
      <div class="form-group">
        <label  class="form-label mt-4">Date_Création</label>
        <input type="date" name="date_creation" class="form-control" >
      </div>
      <div class="form-group row">
        <label  for="slogan" class="col-sm-2 col-form-label">Slogan</label>
        <div class="col-sm-10">
          <input type="text" name="slogan"  >
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Logo</label>
            <div class="col-sm-10">
              <input type="file" name="logo" class="form-control-plaintext" >
            </div>
            <button type="submit" class="btn btn-primary">S'inscire</button>
  </div>
</form>
</body>
