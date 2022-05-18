<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $commandes = Commande::where('user_id', Auth::id())->get();
        return view('frontend.commandes.index', compact('commandes'));
    }

    public function detailscommande($id)
    {
        $commandes = Commande::where('id', $id)->where('user_id', Auth::id())->first();
        return view('frontend.commandes.details', compact('commandes'));

    }
}
