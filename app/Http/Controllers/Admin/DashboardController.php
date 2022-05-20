<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Commande;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $categorie = Categorie::count();
        $articles = Article::count();
        $commandes_terminees = Commande::where('etat', '1')->count();
        $commandes = Commande::where('etat', '0')->count();
        return view('admin.index', compact('categorie','articles','commandes_terminees','commandes'));
    }
    
    
}
