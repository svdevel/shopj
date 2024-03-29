@extends('layouts.admin')

@section('title')
Ajouter une catégorie
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Ajouter une catégorie</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('insert-categorie') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Nom</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Privée</label>
                        <input type="checkbox" name="privee" >
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
                        <textarea name="meta_descrip" rows="3" class="form-control"></textarea>
                    </div>
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