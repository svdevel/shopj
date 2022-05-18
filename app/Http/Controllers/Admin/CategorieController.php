<?php

namespace App\Http\Controllers\Admin;

use Dotenv\Util\Regex;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategorieController extends Controller
{
    public function index()
    {
        $categorie = Categorie::all();
        return view('admin.categories.index', compact('categorie'));
    }

    public function add()
    {
        return view('admin.categories.add');
    }

    public function insert(Request $request)
    {
        $categorie = new Categorie();
        if($request->hasFile('photo'))
        {
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoname = time().'.'.$extension;
            $photo->move('assets/uploads/categories/', $photoname);
            $categorie->photo = $photoname;
        }
        $categorie->name = $request->input('name');
        $categorie->slug = $request->input('slug');
        $categorie->description = $request->input('description');
        $categorie->privee = $request->input('privee') == TRUE ? '1':'0';
        $categorie->public = $request->input('public') == TRUE ? '1':'0';
        $categorie->meta_title = $request->input('meta_title');
        $categorie->meta_keywords = $request->input('meta_keywords');
        $categorie->meta_descrip = $request->input('meta_descrip');
        $categorie->save();
        return redirect('categories')->with('status',"La catégorie a été ajoutée avec succès");
            
    }

    public function edit($id)
    {
        $categorie = Categorie::find($id);
        return view('admin.categories.edit', compact('categorie'));
    }

    public function update(Request $request, $id)
    {
        $categorie = Categorie::find($id);
        if($request->hasFile('photo'))
        {
            $path = 'assets/uploads/categories/'.$categorie->photo;
            if(File::exists($path)) 
            {
                File::delete($path);
            }
            $photo = $request->file('photo');
            $extension = $photo->getClientOriginalExtension();
            $photoname = time().'.'.$extension;
            $photo->move('assets/uploads/categories/', $photoname);
            $categorie->photo = $photoname;
        }

        $categorie->name = $request->input('name');
        $categorie->slug = $request->input('slug');
        $categorie->description = $request->input('description');
        $categorie->privee = $request->input('privee') == TRUE ? '1':'0';
        $categorie->public = $request->input('public') == TRUE ? '1':'0';
        $categorie->meta_title = $request->input('meta_title');
        $categorie->meta_keywords = $request->input('meta_keywords');
        $categorie->meta_descrip = $request->input('meta_descrip');
        $categorie->update();
        return redirect('categories')->with('status',"La catégorie a été mettre à jour avec succès");
           
    }

    public function destroy(Categorie $categorie, $id)
    {
        $categorie = Categorie::find($id);
        if($categorie->photo)
        {
            $path = 'assets/uploads/categories/'.$categorie->photo;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $categorie->delete();
        return redirect('categories')->with('status',"La catégorie a été supprimée avec succès");
    }
}
