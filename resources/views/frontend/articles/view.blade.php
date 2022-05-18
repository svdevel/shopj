@extends('layouts.front')

@section('title', $articles->nom)

@section('content')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
    </div>
</div>
</div>

<div class="py-3 mb-4 shadow-sm border-top" style="background-color: #9c27b0">
<div class="container">
    <h6 class="mb-0 text-light">
        <a href="{{ url('categories-u') }}" class="text-light">
            Catégorie
        </a> /
        <a href="" class="text-light">
            {{ $articles->categorie->name }}
        </a> /
        <a href="{{ url('categorie/'.$articles->categorie->slug.'/'.$articles->slug) }}" class="text-light">
            {{ $articles->nom }}
        </a>
     </h6>
</div>
</div>

<div class="container pb-5">
<div class=" card-shadow article_data">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 border-right">
                <img src="{{ asset('assets/uploads/articles/'.$articles->photo) }}" class="w-100" alt="">
            </div>
            <div class="col-md-8">
                <h2 class="mb-0">
                    {{ $articles->nom }}
                </h2>
                <hr>
                <label class="fw-bold">Prix : {{ $articles->prix }} €</label>
                <p class="mt-3 ">
                    {!! $articles->petite_description !!}
                </p>
                <hr>
                @if($articles->qty > 0)
                    <label class="badge bg-success">En Stock</label>
                @else
                    <label class="badge bg-danger">Rupture de stock</label>
                @endif
                <div class="row mt-2">
                    <div class="col-md-3">
                        <input type="hidden" value="{{ $articles->id }}" class="article_id">
                        <label for="Quantity">Quantité</label>
                        <div class="input-group text-center mb-3" style="width:130px;">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" name="quantity" 
                            class="form-control qty-input text-center" value="1" >
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <br/>
                        @if($articles->qty > 0)
                            <button type="button" class="btn btn-primary me-3  float-start addToPanierBtn">Ajouter au panier <i class="fa fa-shopping-cart"></i></button>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <hr>
                <h3>La description</h3>
                <p class="mt-3 ">
                    {!! $articles->description !!}
                </p>
            </div>
            <hr>
        </div>
    </div>
</div>
</div>

@endsection
