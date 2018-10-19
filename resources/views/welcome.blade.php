@extends('layouts.master')

@section('title') The Shop - Home @endsection



@section('content')
<!-- Page Content -->
<div class="row text-right">
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


</div> <!-- end of row -->
@endsection
