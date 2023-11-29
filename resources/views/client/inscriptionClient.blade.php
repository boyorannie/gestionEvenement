    <x-guest-layout>
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    <h3>TERMINER INSCRIPTION</h3><br><br>
    <link href="https://bootswatch.com/5/lumen/bootstrap.min.css" rel="stylesheet">
    <form method="POST" action="{{ '/client/inscription' }}">
        @csrf

        <!-- prenom -->
        <div>
            <label for="prenom">Prénom</label>
            <input class="block mt-1 w-full" type="text" name="prenom">
        </div>

        <!-- Telephone-->
        <div class="mt-4">
            <label for="telephone">Téléphone</label>
            <input class="block mt-1 w-full" type="number" name="telephone">
        </div>
        <!-- Telephone-->
        <div class="mt-4">
            <label for="telephone">Nombre Accompagnant</label>
            <input class="block mt-1 w-full" type="number" name="accompagnant">
        </div>
        <br> <br>
        <button type="submit" class="btn btn-primary">S'inscire</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</x-guest-layout>
