@extends('layout.main')

@section('content')

    <div class="container py-5">
        <h1>Inserisci un nuovo fumetto</h1>

        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('comics.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo *</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}" placeholder="Scrivi il Titolo">
                @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine *</label>
                <input type="text" class="form-control @error('image') is-invalid @enderror" name="image" id="image" value="{{old('image')}}" placeholder="Scrivi la URL">
                @error('image')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo *</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{old('price')}}" placeholder="Scrivi il prezzo">
                @error('price')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie *</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" name="series" id="series" value="{{old('series')}}" placeholder="Scrivi la serie">
                @error('series')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Giorno vendite *</label>
                <input type="text" class="form-control @error('sale_date') is-invalid @enderror" name="sale_date" id="sale_date" value="{{old('sale_date')}}" placeholder="Scrivi il giorno di inizio vendita">
                @error('sale_date')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Genere *</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type" value="{{old('type')}}" placeholder="Scrivi il Genere">
                @error('type')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione *</label>
                <textarea class="form-control" id="description"  name="description" rows="3">
                    {{old('description')}}
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary">INVIA</button>
        </form>
    </div>

@endsection
