@extends('layouts.front')

@section('title')
Mes commandes
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card shadow mb-3">
                        <h4 class="m-2 ms-3">Votre commande
                            <a href="{{ url('mes-commandes') }}" style="background-color: #9c27b0;" class="btn text-white float-end">Retour</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 commandes-details">
                                <h4>Les détails d'expédition</h4>
                                <hr>
                                <label for="">Prénom</label>
                                <div class="border p-2">{{ $commandes->prenom }}</div>
                                <label for="">Nom</label>
                                <div class="border p-2">{{ $commandes->nom }}</div>
                                <label for="">Email</label>
                                <div class="border p-2">{{ $commandes->email }}</div>
                                <label for="">N° de contact</label>
                                <div class="border p-2">{{ $commandes->phone }}</div>
                                <label for="">Adresse de livraison</label>
                                <div class="border p-2">
                                    {{ $commandes->adresse }}, <br>
                                    {{ $commandes->ville }},<br>
                                    {{ $commandes->code_postal }},<br>
                                    {{ $commandes->pays }}
                                </div>

                            </div>
                            <div class="col-md-6">
                                <h4>Détails de la commande</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Quantité</th>
                                            <th>Prix</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($commandes->commandeitems as $item)
                                            <tr>
                                                <td>{{ $item->articles->nom }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->prix }} €</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/articles/'.$item->articles->photo) }}" width="50px" alt="Product Image">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">Total : <span class="float-end">{{ $commandes->total_prix }} €</span> </h4>

                                <h6 class="px-2">Mode de paiement: {{ $commandes->payment_mode }}</h6>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
