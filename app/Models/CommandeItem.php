<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommandeItem extends Model
{
    use HasFactory;

    protected $table = 'commande_items';
    protected $fillable = [
        'commande_id',
        'article_id',
        'qty',
        'prix',
        
    ];


    public function articles(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}