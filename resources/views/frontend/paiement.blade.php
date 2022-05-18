@extends('layouts.front')

@section('title')
Paiement
@endsection


@section('content')

    <div class="py-3 mb-4 shadow-sm border-top" style="background-color: #9c27b0">
        <div class="container">
            <h6 class="mb-0 text-light">
                <a href="{{ url('/') }}" class="text-light">
                    Accueil
                </a> /
                <a href="{{ url('checkout') }}" class="text-light">
                    Paiement
                </a>
            </h6>
        </div>
    </div>

    <div class="container mt-3">
        <form action="{{ url('passer-commande')}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Adresse de livraison</h6>
                            <hr>
                            <div class="row paiement-form">
                                <div class="col-md-6">
                                    <label for="">Prénom</label>
                                    <input type="text" required class="form-control prenom" value="{{ Auth::user()->prenom }}" name="prenom" placeholder="Entrez votre prénom">
                                    <span id="prenom_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Nom</label>
                                    <input type="text" required class="form-control nom" value="{{ Auth::user()->nom }}" name="nom" placeholder="Entrez votre nom">
                                    <span id="nom_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Email</label>
                                    <input type="text" required class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Entrez votre email">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Téléphone</label>
                                    <input type="text" required class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Entrez votre numéro de téléphone ">
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Adresse</label>
                                    <input type="text" required class="form-control adresse" value="{{ Auth::user()->adresse }}" name="adresse" placeholder="Entrez votre adresse">
                                    <span id="adresse_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Ville</label>
                                    <input type="text" required class="form-control ville" value="{{ Auth::user()->ville }}"  name="ville" placeholder="Entrez votre ville">
                                    <span id="ville_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Code postal</label>
                                    <input type="text" required class="form-control code_postal" value="{{ Auth::user()->code_postal }}"  name="code_postal" placeholder="Entrez votre code postal">
                                    <span id="code_postal" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Pays</label>
                                    <input type="text" required class="form-control pays" value="{{ Auth::user()->pays}}"  name="pays" placeholder="Entrez votre pays">
                                    <span id="pays_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Détails de la commande</h6>
                            <hr>
                            @php $total = 0; @endphp
                            @if($panieritems->count() > 0)
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Quantité</th>
                                            <th>Prix</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($panieritems as $item)
                                        <tr>
                                            <td>{{ $item->articles->nom }}</td>
                                            <td>{{ $item->article_qty }}</td>
                                            <td>{{ $item->articles->prix }} €</td>
                                        </tr>
                                        @php $total += ($item->articles->prix * $item->article_qty) @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <h6 class="px-2">Total  <span class="float-end"> {{ $total }} € </span></h6>
                                <hr>
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" class="btn btn-success w-100 mb-2">Livraison contre remboursement</button>
                            @else
                                <h4 class="text-center">Aucun produit dans le panier</h4>
                            @endif
                        </div>
                    </div>
                </div> 
            </div>
        </form>
    </div>
@endsection


