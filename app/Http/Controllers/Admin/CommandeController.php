<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::where('etat', '0')->get();
        return view('admin.commandes.index', compact('commandes'));
    }

    public function detailscommande($id)
    {
        $commandes = Commande::where('id', $id)->first();
        return view('admin.commandes.details', compact('commandes'));

    }

    public function updatecommande(Request $request, $id)
    {
        $commandes = Commande::find($id);
        $commandes->etat = $request->input('commande_etat');
        $commandes->update();
        return redirect('commandes')->with('status', "La commande a été mise à jour avec succès");

    }

    public function commandesterminees()
    {
        $commandes = Commande::where('etat', '1')->get();
        return view('admin.commandes.terminees', compact('commandes'));
    }
}
