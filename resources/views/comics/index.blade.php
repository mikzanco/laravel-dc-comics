@extends('layout.main')

@section('content')

    <div class="container">
        <h1>ciaoo elenco comics</h1>

        {{-- @forelse($$comics as $comic)
            <div class="card" style="width: 18rem;">
                <img src="{{$comic->thumb}}" class="card-img-top" alt="{{$comic->title}}">
                <div class="card-body">
                    <h5 class="card-title">{{$comic->title}}</h5>
                    <p class="card-text">{{$comic->description}}</p>
                    <a href="#" class="btn btn-primary">XXXX</a>
                </div>
            </div>
        @empty

        @endforelse --}}


        <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tipo</th>
                <th scope="col">Azione</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($comics as $comic )
                    <tr>
                        <th>{{$comic->id}}</th>
                        <td>{{$comic->title}}</td>
                        <td>{{$comic->type}}</td>
                        <td><a class="btn btn-primary" href="{{route('comics.show', $comic)}}" title="show"><i class="fa-solid fa-eye"></i></a></td>
                    </tr>
                @empty

                @endforelse



            </tbody>
          </table>
          {{ $comics->links()}}
    </div>
@endsection
