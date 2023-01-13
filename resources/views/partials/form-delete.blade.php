<form
    onsubmit="return confirm('Conferma l\'eliminazione di: {{$comic->title}}')" class="d-inline"
    action="{{route('comics.destroy', $comic)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" title="delete">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>
