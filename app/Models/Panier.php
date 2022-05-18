<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $table = 'paniers';
    protected $fillable = [
        'user_id',
        'article_id',
        'article_qty'
    ];


    public function articles()
    {
        return $this->belongsTo(Article::class,'article_id','id');
    }
}
