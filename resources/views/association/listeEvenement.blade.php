@extends('welcome')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liste Evenements</h5>

                    <!-- Table with stripped rows -->
                    <table class="table ">
                        <thead>
                            <tr>
                               
                                <th scope="col">Image</th>
                                <th scope="col">Libellé</th>
                                <th scope="col">Description</th>
                                <th scope="col">Statut</th>
                                <th scope="col">Date Evenement</th>
                                <th scope="col">Date Limite Inscription</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evenements as $evenement)
                            <tr>
                              
                                <td>
                                    <img src="{{asset('storage/'. $evenement->image_mise_en_avant) }}" alt="" class="rounded-circle" width="40" height="40">
                                </td>
                                <td>{{ $evenement->libelle }} </td>
                                <td>{{ $evenement->description }}</td>
                                <td>{{ $evenement->statut }}</td>
                                <td>{{ $evenement->date_evenement }}</td>
                                <td>{{ $evenement->date_limite_inscription }}</td>
                               
                                {{-- <td class="d-flex justify-content-center align-items-center">
                                    <a href="/admin/article/{{$evenement->id}}" class="btn btn-warning m-1">Voir plus</a>
                                    <a href="/admin/modifier/{{$evenement->id}}" class="btn btn-warning m-1">Modifier</a> --}}
                                    {{-- <form method="POST" action="/admin/articleSupprimer/{{ $article->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-1">Supprimer</button>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>













@endsection()