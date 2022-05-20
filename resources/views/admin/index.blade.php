@extends('layouts.admin')

@section('title')
Tableau de bord
@endsection

@section('content')
<div class="card py-5">
    <div class="card-body">
        <h1 class="font-weight-bold m-sm-3">Bonjour Admin</h1>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-primary rounded" >
                            <a href="{{ url('categories/') }}">
                                <h4 class="font-weight-bold text-white font-weight-bold text-center">Catégories : {{ $categorie }}
                                </h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-info rounded">
                            <a href="{{ url('articles/') }}">
                                <h4 class="font-weight-bold text-white text-center">Articles : {{ $articles }} </h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body rounded" style="background-color: orange">
                            <a href="{{ url('commandes/') }}">
                                <h4 class="font-weight-bold text-center">Commandes en cours : {{ $commandes }} </h4>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body bg-success rounded">
                            <a href="{{ url('commandes-terminees/') }}">
                                <h4 class="font-weight-bold text-white text-center">Commandes terminées : {{ $commandes_terminees }} </h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection