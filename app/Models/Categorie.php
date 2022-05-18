<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'descritpion',
        'privee',
        'public',
        'photo',
        'meta_title',
        'meta_descrip',
        'meta_keywords',
    ];
}
