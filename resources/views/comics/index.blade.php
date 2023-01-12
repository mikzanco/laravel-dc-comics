@extends('layout.main')

@section('content')

    <div class="container">
        <h1 class="py-5">Fumetti</h1>
        <div class="row">
            @forelse($comics as $comic)

                    <div class="col-4">
                        <div class="card d-flex" style="width: 18rem;">
                            <img src="{{$comic->image}}" class="card-img-top" alt="{{$comic->title}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$comic->title}}</h5>
                                <div class="overflow-auto">
                                    <p class="card-text scrollbar">{{$comic->description}}</p>
                                </div>

                                <a class="btn btn-primary justify-center" href="{{route('comics.show', $comic)}}" title="show"><i class="fa-solid fa-eye"></i></a>
                            </div>
                        </div>
                    </div>

            @empty

            @endforelse
        </div>
        <!--
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
                        {{-- <td><a class="" href=""></a></td> --}}
                    </tr>
                @empty

                @endforelse



            </tbody>
          </table>
        -->
          {{ $comics->links()}}
    </div>
@endsection
