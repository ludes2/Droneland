@extends('layouts.master')

@section('title') The Shop - Home @endsection



@section('content')
<!-- Page Content -->

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
</div>

<div class="row">
    <div class="collapse show" id="sidebar">
            <ul class="sieNagivation list-unstyled">
                @each('partials.sideNavigation', $categories, 'category')
            </ul>
    </div>

    {{--<div class="col mx-auto px-5">
        <!-- Modal -->
        <div class="modal fade" id="searchResults" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search Results</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="searchResultsContent">
                        --}}{{--@if(isset($products_found))
                            @include('shop.search_results')
                        @endif--}}{{--

                    </div>
                </div>
            </div>
        </div>
    </div>--}}

    <div class="col mx-auto px-5" id="testJumbo">
        <div class="jumbotron">
            <h1 class="display-4">Neu im Sortiment!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>




    <div class="col mx-auto px-5 d-none"  id="searchResults">
    @if(isset($products_found))
        @include('shop.search_results')
    </div>
    @endif


</div> <!-- end of row -->

@endsection
