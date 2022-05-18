<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Panier;
use App\Models\Article;
use App\Models\Commande;
use App\Models\CommandeItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    public function index()
    {
        $old_panieritems = Panier::where('user_id', Auth::id())->get();
        foreach ($old_panieritems as $item) {
            if (!Article::where('id', $item->article_id)->where('qty' , '>=', $item->article_qty)->exists()) 
            {
                $removeitem = Panier::where('user_id', Auth::id())->where('article_id', $item->article_id)->first();
                $removeitem->delete();
            }
            $panieritems = Panier::where('user_id', Auth::id())->get();
        }
        return view('frontend.paiement', compact('panieritems'));
    }


    public function passercommande(Request $request)
    {
        $commande = new Commande();
        $commande->user_id = Auth::id();
        $commande->prenom = $request->input('prenom');
        $commande->nom = $request->input('nom');
        $commande->email = $request->input('email');
        $commande->phone = $request->input('phone');
        $commande->adresse = $request->input('adresse');
        $commande->ville = $request->input('ville');
        $commande->code_postal = $request->input('code_postal');
        $commande->pays = $request->input('pays');

        // Pour calculer prix total 
        $total = 0;
        $panieritems_total = Panier::where('user_id', Auth::id())->get();
        foreach($panieritems_total as $article)
        {
            $total += $article->articles->prix * $article->article_qty;
        }
        $commande->total_prix = $total;
        // ==============================

        $commande->tracking_no = 'eshopj'.rand(1111,9999);
        $commande->save();



        $panieritems = Panier::where('user_id', Auth::id())->get();
        foreach($panieritems as $item)
        {
            CommandeItem::create([
                'commande_id' => $commande->id,
                'article_id' => $item->article_id,
                'qty' =>$item->article_qty,
                'prix' => $item->articles->prix,
            ]);
            
            $article = Article::where('id', $item->article_id)->first();
            $article->qty = $article->qty - $item->article_qty;
            $article->update();
        }

        if (Auth::user()->adresse == NULL) 
        {
            $user = User::where('id', Auth::id())->first();
            $user->prenom = $request->input('prenom');
            $user->nom = $request->input('name');
            $user->phone = $request->input('phone');
            $user->adresse = $request->input('adresse');
            $user->ville = $request->input('ville');
            $user->code_postal = $request->input('code_postal');
            $user->pays = $request->input('pays');
            $user->update();
        }

        $panieritems = Panier::where('user_id', Auth::id())->get();
        Panier::destroy($panieritems);
        return redirect('/')->with('status', "Commande passée avec succès");
    }
}
