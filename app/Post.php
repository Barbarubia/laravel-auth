<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    // Funzione per usare lo slug nell'url della funzione show
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = ['title', 'image', 'content', 'slug'];

    // La funzione generateSlug creata a lezione funziona e non saprei come farla diversamente :-)
    // TODO: creare lo slug e aggiungere alla fine l'id del post
    static public function generateSlug($stringToSlug) {
        $baseSlug = Str::of($stringToSlug)->slug('-')->__toString();
        $slug = $baseSlug;
        $_i = 1;
        while(self::where('slug', $slug)->first()) {
            $slug = "$baseSlug-$_i";
            $_i++;
        }
        return $slug;
    }
}
