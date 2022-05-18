@extends('layouts.admin')

@section('title')
Modifier une catégorie
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Modifier une catégorie</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-categorie/'.$categorie->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nom</label>
                        <input type="text" value="{{ $categorie->name}}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $categorie->slug}}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ $categorie->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Privée</label>
                        <input type="checkbox" {{ $categorie->privee == "1" ? 'checked':'' }} name="privee" >
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Public</label>
                        <input type="checkbox" {{ $categorie->public == "1" ? 'checked':'' }} name="public">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Titre</label>
                        <input type="text" value="{{ $categorie->meta_title}}" class="form-control" name="meta_title">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Mots clés</label>
                        <textarea name="meta_keywords"  rows="3" class="form-control">{{ $categorie->meta_keywords}}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_descrip"  rows="3" class="form-control">{{ $categorie->meta_descrip}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                    </div>
                    @if ( $categorie->photo)
                        <img src="{{ asset('assets/uploads/categories/'. $categorie->photo)}}" alt="Photo de categorie" style="width: 25%">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="photo" class="form-control">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection