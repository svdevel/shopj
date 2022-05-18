@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Les Articles</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Categorie</th>
                        <th>Nom</th>
                        <th>Prix de l'offre</th>
                        <th>Quantité</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->categorie->name }}</td>
                            <td>{{ $item->nom }}</td>
                            <td>{{ $item->prix }} €</td>
                            <td>{{ $item->qty }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/articles/'.$item->photo) }}" class="cate-image" alt="Image here">
                            </td>
                            <td>
                                <a href="{{ url('edit-article/'.$item->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <a href="{{ url('delete-article/'.$item->id) }}" class="btn btn-danger btn-sm">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
 
