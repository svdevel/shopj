@extends('layouts.front')

@section('title')
    Mes commandes
@endsection

@section('content')
    <div class="container py-5">
        <div class="card shadow mb-3">
            <h4 class="m-2 ms-3">Mes commandes</h4>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date de commande</th>
                                    <th>Numéro de suivi</th>
                                    <th>Prix total</th>
                                    <th>État</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($commandes as $item)
                                    <tr>
                                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                        <td>{{ $item->tracking_no }}</td>
                                        <td>{{ $item->total_prix }} €</td>
                                        <td>{{ $item->etat == '0' ?'En cours' : 'Terminé' }}</td>
                                        <td>
                                            <a href="{{ url('details-commande/'.$item->id) }}" style="background-color: #9c27b0;" class="btn text-light">Détails</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
