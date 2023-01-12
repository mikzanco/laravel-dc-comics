<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comic extends Model
{
    use HasFactory;

    public static function generateSlug($string){

        $slug = Str::slug($string, '-');

        $original_slug = $slug;

        $Comic_exists = Comic::where('slug', $slug)->first();

        $c = 1;

        while($Comic_exists){


            $slug = $original_slug . '-' . $c;
            $c++;

            $Comic_exists = Comic::where('slug', $slug)->first();


        }

        return $slug;

    }
}
