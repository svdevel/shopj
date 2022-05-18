@extends('layouts.front')

@section('title')
Catégorie
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm border-top" style="background-color: #9c27b0">
    <div class="container">
        <h6 class="mb-0 text-light">
            <a href="{{ url('categories-u') }}" class="text-light text-decoration-none fs-3">
                Toutes catégories
            </a>
        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Toutes catégories</h2>
                <div class="row">
                    @foreach ($categories as $item)
                        <div class="col-md-3 mb-3">
                            <a href="{{ url('view-categorie/'.$item->slug) }}" class="text-decoration-none">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/categories/'.$item->photo) }}" alt="Category image">
                                    <div class="card-body">
                                        <h5>{{ $item->name }}</h5>
                                        <p>
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
