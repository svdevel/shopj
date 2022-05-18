@extends('layouts.front')

@section('title')
Page d'accueil
@endsection

@section('content')
@include('layouts.inc.slider')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Découvrez nos catégories</h2>
            <div class="owl-carousel owl-theme firstplan-carousel mt-2">
                @foreach ($firstplan_categories as $item)
                <div class="item">
                    <a href="{{ url('view-categorie/'.$item->slug) }}">
                        <div class="card">
                            <img src="{{ asset('assets/uploads/categories/'.$item->photo) }}" alt="Categorie img">
                            <div class="card-body">
                                <h5><b>{{ $item->name }}</b></h5>
                    </a>
                    <p>
                        {{ $item->description }}
                    </p>
                </div>
            </div>

        </div>
        @endforeach
    </div>
</div>
</div>
</div>
@endsection

@section('scripts')
<script>
    $('.firstplan-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        800:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>

@endsection