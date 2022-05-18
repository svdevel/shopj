<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // $firstplan_articles = Article::where('public', '1')->take(16)->get();
        $firstplan_categories = Categorie::where('public', '1')->take(16)->get();
        return view('frontend.index', compact('firstplan_categories'));
    }

    public function categories()
    {
        $categories = Categorie::where('privee', '0')->get();
        return view('frontend.categories', compact('categories'));
    }

    public function viewcategorie($slug)
    {
        if (Categorie::where('slug', $slug)->exists()) {
            $categorie = Categorie::where('slug', $slug)->first();
            $articles = Article::where('cate_id', $categorie->id)->where('prive', '0')->get();
            return view('frontend.articles.index', compact('categorie', 'articles'));
        } else {
            return redirect('/')->with('status', "Slug n'existe pas");
        }
    }


    public function viewarticle($categorie_slug, $article_slug)
    {
        if (Categorie::where('slug', $categorie_slug)->exists()) 
        {
            if (Article::where('slug', $article_slug)->exists()) 
            {
                $articles = Article::where('slug', $article_slug)->first();
                return view('frontend.articles.view', compact('articles'));
            } 
        } else{
            return redirect('/')->with('status', "Aucune catégorie trouvée");
        }
    }
}
