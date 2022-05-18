<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $fillable = [
        'cate_id',
        'nom',
        'slug',
        'petite_description',
        'description',
        'prix',
        'photo',
        'qty',
        'prive',
        'public',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'cate_id', 'id');
    }
}
