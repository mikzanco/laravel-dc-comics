@extends('layout.main')

@section('content')

    <div class="container py-5">
        <h1>{{$comic->title}}</h1>

        <div>Serie: <strong>{{$comic->series}}</strong></div>
        <div>Data: <strong>{{$comic->sale_date}}</strong></div>
        <div>Prezzo: <strong>{{$comic->price}} €</strong></div>

        <div class="text-center py-5">
            <img src="{{$comic->image}}" alt="{{$comic->title}}">
        </div>
        <p>{!!$comic->description!!}</p>
        <a class="btn btn-primary" href="{{route('comics.index')}}">Torna all'elenco dei fumetti</a>
    </div>

@endsection
