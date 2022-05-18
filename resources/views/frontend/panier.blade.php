@extends('layouts.front')

@section('title')
Mon Panier
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm border-top" style="background-color: #9c27b0">
    <div class="container">
        <h6 class="mb-0 text-light">
            <a href="{{ url('/') }}" class="text-light">
                Accueil
            </a> /
            <a href="{{ url('panier') }}" class="text-light">
                Panier
            </a>
        </h6>
    </div>
</div>

<div class="container my-5">

    <div class="card shadow mb-3">
        <h4 class="m-2 ms-3">Votre panier</h4>
    </div>

    <div class="card shadow panieritems">
        @if($panieritems->count() > 0)
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach ($panieritems as $item)
            <div class="row article_data">
                <div class="col-md-2 my-auto">
                    <img src="{{ asset('assets/uploads/articles/'.$item->articles->photo) }}" class="w-100"
                        alt="Image here">
                </div>
                <div class="col-md-3 my-auto">
                    <h6>{{ $item->articles->nom }} </h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>{{ $item->articles->prix }} €</h6>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" class="article_id" value="{{ $item->article_id }}">
                    @if( $item->articles->qty >= $item->article_qty)
                    <label for="Quantity">Quantité</label>
                    <div class="input-group text-center mb-3" style="width:130px;">
                        <button class="input-group-text changeQty decrement-btn">-</button>
                        <input type="text" name="quantity" class="form-control qty-input text-center"
                            value="{{ $item->article_qty }}">
                        <button class="input-group-text changeQty increment-btn">+</button>
                    </div>
                    @php $total += $item->articles->prix * $item->article_qty ; @endphp
                    @else
                    <h6>En rupture de stock</h6>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger delete-panier-item"> <i class="fa fa-trash"></i> Retirer</button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Prix total : {{ $total }} €
                <a href="{{ url('paiement') }}" class="btn btn-outline-success float-end">Passer à la caisse</a>
            </h6>
        </div>
        @else
        <div class="card-body text-center">
            <h2>Votre <i class="fa fa-shopping-cart"></i> panier est vide</h2>
            <a href="{{ url('categories-u') }}" class="btn btn-outline-primary float-end">Continuer vos achats</a>
        </div>
        @endif
    </div>
</div>
@endsection