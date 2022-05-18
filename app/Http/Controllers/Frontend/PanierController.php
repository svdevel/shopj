<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Panier;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PanierController extends Controller
{
    public function addArticle(Request $request)
    {
        $article_id = $request->input('article_id');
        $article_qty = $request->input('article_qty');

        if (Auth::check()) {
            $article_check = Article::where('id', $article_id)->first();

            if ($article_check) {

                if (Panier::where('article_id', $article_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $article_check->nom . " Déjà ajouté au panier"]);
                } else {
                    $panierItem = new Panier();
                    $panierItem->article_id = $article_id;
                    $panierItem->user_id = Auth::id();
                    $panierItem->article_qty = $article_qty;
                    $panierItem->save();
                    return response()->json(['status' => $article_check->nom . " Ajouté au panier"]);
                }
            }
        } else {
            return response()->json(['status' => "Connectez-vous pour continuer"]);
        }
    }


    public function viewpanier()
    {
        $panieritems = Panier::where('user_id', Auth::id())->get();
        return view('frontend.panier', compact('panieritems'));
    }


    public function updatepanier(Request $request)
    {
        $article_id = $request->input('article_id');
        $article_qty = $request->input('article_qty');

        if (Auth::check()) 
        {
            if (Panier::where('article_id', $article_id)->where('user_id', Auth::id())->exists()) 
            {
                $panier = Panier::where('article_id', $article_id)->where('user_id', Auth::id())->first();
                $panier->article_qty = $article_qty;
                $panier->update();
                return response()->json(['status' => "Quantité mise à jour"]);
            }
        }
        
    }
    
    public function deletearticle(Request $request)
    {
        if (Auth::check()) {
            $article_id = $request->input('article_id');
            if (Panier::where('article_id', $article_id)->where('user_id', Auth::id())->exists()) {
                $panierItem = Panier::where('article_id', $article_id)->where('user_id', Auth::id())->first();
                $panierItem->delete();
                return response()->json(['status' => "L'article a été supprimé avec succès"]);
            }
        } else {
            return response()->json(['status' => "Connectez-vous pour continuer"]);
        }
    }

}
        
