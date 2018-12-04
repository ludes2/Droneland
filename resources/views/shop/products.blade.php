@extends('layouts.master')

@section('title') Products @endsection

@section('content')

    <div class="row text-right pt-5">
        <div class="sidebar-header col-sm-3 pl-5 text-left">
            <h3>Products <a href="#" data-target="#sidebar" data-toggle="collapse"><i class="fa fa-navicon"></i></a></h3>
        </div>
        <div class="col-sm-9 pr-5">
            <a href="{{ route('shoppingCart') }}">
                <i class=" pt-4 fa fa-shopping-cart"></i>  Shopping Cart
                <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span>
            </a>
        </div>
    </div> <!-- SHOPPING CART ROW -->

    <div class="row">
        <div class="col-2">
            <div class="collapse show" id="sidebar">
                <ul class="sieNavigation list-unstyled">
                    @each('partials.sideNavigation', $categories, 'category')
                </ul>
            </div>
        </div>

        <div class="col mx-auto px-5" id="products">

            @foreach($products->chunk(4) as $productChunk)
                 <div class="row">
                    @foreach($productChunk as $product)
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card bg-transparent h-100 productCard">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <a href="{{ route('getSingleProduct', $product->id) }}">{{ $product->title }}</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <a href="#"><img class="card-img-top" src="{{ asset($product->thumbnail) }}" alt=""></a>
                                    <p class="card-text">{{ $product->short_description }}</p>
                                </div>
                                <div class="card-footer">
                                    <a>{{ number_format($product->price, 0, ',', "'") }}.-</a>
                                    <a href="{{ route('addToCart', $product->id) }}" class="btn btn-primary pull-right" role="button">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                 </div>
            @endforeach

        </div> <!-- end of Products -->
    </div> <!-- end of Row -->

@endsection