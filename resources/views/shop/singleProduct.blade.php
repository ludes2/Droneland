@extends('layouts.master')

@section('title') {{ $product->title }} @endsection

@section('content')
    <div class="row">

            <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < count($product->pictures); $i++): ?>
                    <li data-target="#carouselIndicators" data-slide-to="$i" class="{{ $i === 0 ? 'active' : '' }}"></li>
                    <?php endfor ?>
                </ol>
                <div class="carousel-inner">
                    <?php for ($i = 0; $i < count($product->pictures); $i++): ?>
                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                        <img class="d-block w-100" src="{{ $product->pictures[$i]['path_to_picture'] }}" alt="First slide">
                    </div>
                    <?php endfor ?>
                </div>
                <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

    </div>

    <div class="row">

    </div>
@endsection