@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Ajouter un article</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-article') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Catégorie</label>
                        <select class="form-select" name="cate_id" >
                            <option value="">Sélectionnez une catégorie</option>
                            @foreach ($categorie as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Nom</label>
                        <input type="text" class="form-control" name="nom">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description courte</label>
                        <textarea name="petite_description" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Prix</label>
                        <input type="number" class="form-control" name="prix">
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="">Quantité</label>
                        <input type="number" class="form-control" name="qty">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Privé</label>
                        <input type="checkbox" name="prive" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Public</label>
                        <input type="checkbox" name="public">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Titre</label>
                        <input type="text" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Mots clés</label>
                        <textarea name="meta_keywords" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

