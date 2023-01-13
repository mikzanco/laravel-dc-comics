@extends('layout.main')

@section('content')

    <div class="container">
        <h1 class="py-5">Fumetti</h1>

        @if(session('deleted'))
            <div class="alert alert-secondary" role="alert">
                {{session('deleted')}}
            </div>
        @endif


        <div class="row">
            @forelse($comics as $comic)

                    <div class="col-4">
                        <div class="card d-flex" style="width: 18rem;">
                            <img src="{{$comic->image}}" class="card-img-top" alt="{{$comic->title}}">
                            <div class="card-body ">
                                <h5 class="card-title">{{$comic->title}}</h5>
                                <div class="overflow-auto h-70">
                                    <p class="card-text ">{{$comic->description}}</p>
                                </div>
                                <a class="btn btn-primary justify-center" href="{{route('comics.show', $comic)}}" title="show"><i class="fa-solid fa-eye"></i></a>
                                <a class="btn btn-warning justify-center" href="{{route('comics.edit', $comic)}}" title="edit"><i class="fa-solid fa-pen"></i></a>

                                {{-- per il DELETED serve un form --}}
                                <form
                                    onsubmit="return confirm('Conferma l\'eliminazione di: {{$comic->title}}')"
                                    class="d-inline"
                                    action="{{route('comics.destroy', $comic)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
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
