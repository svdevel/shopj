@extends('layouts.front')

@section('title')
    {{ $categorie->name }}
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm border-top" style="background-color: #9c27b0">
    <div class="container">
        <h6 class="mb-0 text-light">
            <a href="{{ url('categorie') }}" class="text-light text-decoration-none fs-3">
                Catégorie /
            </a> 
            <a href="{{ url('categorie/'.$categorie->slug) }}" class="text-light text-decoration-none fs-3">
                {{ $categorie->name }}
            </a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2> {{ $categorie->name }}</h2>
            @foreach ($articles as $item)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <a href="{{ url('view-article/'.$categorie->slug.'/'.$item->slug) }}" class="text-decoration-none">
                            <img src="{{ asset('assets/uploads/articles/'.$item->photo) }}" class="w-100" alt="Article img">
                            <div class="card-body">
                                <h5>{{ $item->nom }}</h5>
                                <span class="float-start">{{ $item->prix }} €</span>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
