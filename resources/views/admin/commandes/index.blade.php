@extends('layouts.admin')

@section('title')
    Commandes
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card shadow mb-3">
                        <h4 class="">Nouvelles commandes
                            <a href="{{ url('commandes-terminees')}}" style="background-color: #9c27b0;" class="btn float-right">Commandes Terminées</a>
                        </h4>
                    </div>
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
                                        <td>{{ $item->etat == '0' ?'En attente' : 'Terminée' }}</td>
                                        <td>
                                            <a href="{{ url('admin/details-commande/'.$item->id) }}" class="btn btn-primary">Détails</a>
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
