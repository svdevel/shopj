<?php

namespace App\Models;

use App\Models\CommandeItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'commandes';
    protected $fillable = [
        'user_id',
        'prenom',
        'nom',
        'email',
        'phone',
        'adresse',
        'ville',
        'code_postal',
        'pays',
        'total_prix',
        'etat',
        'tracking_no'
    ];

    public function commandeitems()
    {
        return $this->hasMany(CommandeItem::class);
    }
}