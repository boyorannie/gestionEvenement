<x-guest-layout>
 
    <link href="https://bootswatch.com/5/lumen/bootstrap.min.css" rel="stylesheet">

@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-1"></i>
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

<body>

  <h3>TERMINER INSCRIPTION</h3><br><br>     
    <form action="{{'/association/inscrip'}}" method="POST" enctype="multipart/form-data">
@csrf
@if(count($errors) >0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="bi bi-exclamation-octagon me-1"></i>
    @foreach($errors->all() as $error)
    {{$error}}
    @endforeach
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
        <label  for="name" >Nom Association:</label>
          <input type="text" name="nom"><br><br>
       
        <label >Date_Création: </label>
        <input type="date" name="date_creation" class="form-control" ><br>
    
        <label  for="slogan" class="col-sm-2 col-form-label">Slogan:</label>
       <input type="text" name="slogan"><br><br>
            <label >Logo:</label>
              <input type="file" name="logo" class="form-control-plaintext"><br><br>
      
            <button type="submit" class="btn btn-primary">S'inscire</button>
          </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</x-guest-layout>

