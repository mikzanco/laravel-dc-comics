@extends('layout.main')

@section('content')

    <div class="container py-5">
        <h1>Inserisci un nuovo fumetto</h1>

        <form action="{{route('comics.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Scrivi il Titolo">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="text" class="form-control" name="image" id="image" placeholder="Scrivi la URL">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Scrivi il prezzo">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control" name="series" id="series" placeholder="Scrivi la serie">
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Giorno vendite</label>
                <input type="text" class="form-control" name="sale_date" id="sale_date" placeholder="Scrivi il giorno di inizio vendita">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Genere</label>
                <input type="text" class="form-control" name="type" id="type" placeholder="Scrivi il Genere">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="3"></textarea>
            </div>
        </form>
    </div>

@endsection
