@extends('layout.main')

@section('content')

    <div class="container py-5">
        <h1>{{$comic->title}}</h1>

        <div class="text-center py-5">
            <img src="{{$comic->image}}" alt="{{$comic->title}}">
        </div>


    </div>
@endsection
