<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100|min:2',
            'image' => 'required|max:255|min:10',
            'series' => 'required|max:255|min:3',
            'price' => 'required|min:0',
            'sale_date' => 'required|max:255|min:8',
            'type' => 'required|max:255|min:10',
            'description' => 'required|min:4',
        ];
    }

    public function messages(){
        return [
            'title.requires' => 'Il titolo è un campo obbligatorio',
            'title.max' => 'Il titolo deve al massimo :max caratteri',
            'title.min' => 'Il titolo deve al minimo :min caratteri',
            'image.requires' => 'La URL è un campo obbligatorio',
            'image.max' => 'L\'immagine deve al massimo al massimo :max caratteri',
            'image.min' => 'L\'immagine deve al massimo al minimo :min caratteri',
            'series.requires' => 'Il titolo è un campo obbligatorio',
            'price.requires' => 'Il prezzo è un campo obbligatorio',
            'price.min' => 'Il prezzo minimo è :min ',
            'sale_date' => 'La data deve essere composta dal giorno, il mese e l\'anno',
            'title.requires' => 'Il titolo è un campo obbligatorio',
            'type.requires' => 'Il titolo è un campo obbligatorio',
            'type.min' => 'Il tipo deve essere composto da almeno :min carattieri',
            'type.max' => 'Il tipo deve essere composto da un massimo di :max carattieri',
            'description.requires' => 'La descrizione è obbligatoria',
            'description.min' => 'La descrizione deve avere al minimo :min caratteri',
            'description.max' => 'La descrizione al massimo può avere :max caratteri',
        ];
    }
}
