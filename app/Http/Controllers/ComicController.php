<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComicRequest;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::orderBy('id','desc')->paginate(6);
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComicRequest $request)
    {

        /* VALIDAZIONE */
        // $request->validate([
        //     'title' => 'required|max:100|min:2',
        //     'image' => 'required|max:255|min:10',
        //     'series' => 'required|max:255|min:3',
        //     'price' => 'required|min:0',
        //     'sale_date' => 'required|max:255|min:8',
        //     'type' => 'required|max:255|min:10',
        //     'description' => 'required|min:4',
        // ],
        // [
        //     'title.requires' => 'Il titolo è un campo obbligatorio',
        //     'title.max' => 'Il titolo deve al massimo :max caratteri',
        //     'title.min' => 'Il titolo deve al minimo :min caratteri',
        //     'image.requires' => 'La URL è un campo obbligatorio',
        //     'image.max' => 'L\'immagine deve al massimo al massimo :max caratteri',
        //     'image.min' => 'L\'immagine deve al massimo al minimo :min caratteri',
        //     'series.requires' => 'Il titolo è un campo obbligatorio',
        //     'price.requires' => 'Il prezzo è un campo obbligatorio',
        //     'price.min' => 'Il prezzo minimo è :min ',
        //     'sale_date' => 'La data deve essere composta dal giorno, il mese e l\'anno',
        //     'title.requires' => 'Il titolo è un campo obbligatorio',
        //     'type.requires' => 'Il titolo è un campo obbligatorio',
        //     'type.min' => 'Il tipo deve essere composto da almeno :min carattieri',
        //     'type.max' => 'Il tipo deve essere composto da un massimo di :max carattieri',
        //     'description.requires' => 'La descrizione è obbligatoria',
        //     'description.min' => 'La descrizione deve avere al minimo :min caratteri',
        //     'description.max' => 'La descrizione al massimo può avere :max caratteri',



        // ]);

        $form_data = $request->all();

        $new_comic = new Comic();
        // $new_comic->title = $form_data['title'];
        // $new_comic->slug = Comic::generateSlug($new_comic->title);
        // $new_comic->description = $form_data['description'];
        // $new_comic->image = $form_data['image'];
        // $new_comic->price = $form_data['price'];
        // $new_comic->series = $form_data['series'];
        // $new_comic->sale_date = $form_data['sale_date'];
        // $new_comic->type = $form_data['type'];

        // creato il fill in model posso associare tutte le chiavi che sono in fillable model

        $form_data['slug'] = Comic::generateSlug($form_data['title']);
        $new_comic->fill($form_data);
        $new_comic->save();
        // dd($new_comic);
        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        // $comic = Comic::findOrFail($id);

        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $form_data = $request->all();
        // dump($comic);
        // dd($form_data);

        if ($form_data['title'] != $comic->title) {
            $form_data['slug'] = Comic::generateSlug($form_data['title']);

        }else{
            $form_data['slug'] = $comic->slug;
        }

        $comic->update($form_data);
        // reinderizzo alla show

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        // con un return torniamo alla index
        return redirect()->route('comics.index')->with('deleted', "Il fumetto $comic->title è stato eliminato correttamente");
    }
}
