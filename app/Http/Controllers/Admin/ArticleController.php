<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }

    public function add()
    {
        $categorie = Categorie::all();
        return view('admin.articles.add', compact('categorie'));
    }

    public function insert(Request $request)
    {
        $articles = new Article();
        if($request->hasFile('photo'))
        {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoname = time().'.'.$extension;
            $photo->move('assets/uploads/articles/', $photoname);
            $articles->photo = $photoname;
        }

        
        $articles->cate_id = $request->input('cate_id');
        $articles->nom = $request->input('nom');
        $articles->slug = $request->input('slug');
        $articles->petite_description = $request->input('petite_description');
        $articles->description = $request->input('description');
        $articles->prix = $request->input('prix');
        $articles->qty = $request->input('qty');
        $articles->prive = $request->input('prive') == TRUE ? '1':'0';
        $articles->public = $request->input('public') == TRUE ? '1':'0';
        $articles->meta_title = $request->input('meta_title');
        $articles->meta_keywords = $request->input('meta_keywords');
        $articles->meta_description = $request->input('meta_description');
        $articles->save();
        return redirect('articles')->with('status',"L article a été ajouté avec succès");

    }

    public function edit($id)
    {
        $articles = Article::find($id);
        return view('admin.articles.edit', compact('articles'));
    }

    public function update(Request $request, $id)
    {
        $articles = Article::find($id);
        if($request->hasFile('photo'))
        {
            $path = 'assets/uploads/articles/'.$articles->photo;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoname = time().'.'.$extension;
            $photo->move('assets/uploads/articles/', $photoname);
            $articles->photo = $photoname;
        }
        $articles->nom = $request->input('nom');
        $articles->slug = $request->input('slug');
        $articles->petite_description = $request->input('petite_description');
        $articles->description = $request->input('description');
        $articles->prix = $request->input('prix');
        $articles->qty = $request->input('qty');
        $articles->prive = $request->input('prive') == TRUE ? '1':'0';
        $articles->public = $request->input('public') == TRUE ? '1':'0';
        $articles->meta_title = $request->input('meta_title');
        $articles->meta_keywords = $request->input('meta_keywords');
        $articles->meta_description = $request->input('meta_description');
        $articles->update();
        return redirect('articles')->with('status',"L article a été mis à jour avec succès");
    }

    public function destroy($id)
    {
        $articles = Article::find($id);
        $path = 'assets/uploads/articles/'.$articles->photo;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $articles->delete();
        return redirect('articles')->with('status',"L article a été supprimé avec succès");
    }
}
