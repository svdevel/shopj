@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Modifier l'article</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-article/'.$articles->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Catégories</label>
                        <select class="form-select">
                            <option value="">{{ $articles->categorie->name }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Nom</label>
                        <input type="text" class="form-control" value="{{ $articles->nom }}" name="nom">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" value="{{ $articles->slug }}" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description courte</label>
                        <textarea name="petite_description" class="form-control">{{ $articles->petite_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control">{{ $articles->description }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Prix</label>
                        <input type="number" value="{{ $articles->prix }}" class="form-control" name="prix">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Quantité</label>
                        <input type="number" value="{{ $articles->qty }}"  class="form-control" name="qty">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Privé</label>
                        <input type="checkbox" {{ $articles->prive == "1" ? 'checked' : '' }} name="status" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Public</label>
                        <input type="checkbox" {{ $articles->public == "1" ? 'checked' : '' }} name="trending">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{ $articles->meta_title }}"  class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Mots clés</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{ $articles->meta_keywords }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{ $articles->meta_description }}</textarea>
                    </div>
                    @if($articles->photo)
                        <img src="{{ asset('assets/uploads/articles/'.$articles->photo) }}" alt="" style="width: 25%">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

