@extends('layouts.master')

@section('title') Shopping Cart @endsection

@section('content')

<div class="content py-4">
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light" id="shoppingCartHeader">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Shopping cart
            <a id="shoppingCardLabel" href="{{ route('index') }}" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <!-- PRODUCTS -->
            @if(Session::has('cart'))
                @foreach($products as $product)
                <div class="row py-2">
                    <div class="col-12 col-sm-12 col-md-2 text-center">
                        <img class="img-responsive" src="{{ asset($product['item']['thumbnail']) }}" alt="preview" width="120" height="80">
                    </div>
                    <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                        <h4 class="product-name"><strong>{{ $product['item']['title']}}</strong></h4>
                        <h4>
                            <small>{{ $product['item']['short_description'] }}</small>
                        </h4>
                    </div>
                    <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                        <div class="col-3 col-sm-3 col-md-6 text-md-right pt-3">
                            <h6><strong>{{ number_format($product['price'], 0, ',', "'") }}.-</strong></h6>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4 pt-2">
                            <div class="quantity">
                                <!--<input type="button" value="+" class="plus">-->
                                <input type="number" step="1" max="99" min="1" value="{{ $product['quantity'] }}" title="Quantity" class="qty"
                                       size="4">
                                <!--<input type="button" value="-" class="minus">-->
                            </div>
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-right pt-2">
                            <button type="button" class="btn btn-outline-danger btn-xs">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
                <hr>
                <!-- END OF PRODUCTS -->

                <div class="pull-right">
                    <a href="" class="btn btn-outline-secondary pull-right">
                        Update shopping cart
                    </a>
                </div>

                </div>
                <div class="card-footer">
                    <div class="pull-right px-3">
                        <a href="{{ route('checkout') }}" class="btn btn-primary pull-right">Checkout</a>
                        <div class="pull-right px-2">
                            Total price: <b>{{ number_format($totalPrice, 0, ',', "'") }}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            Your shopping cart is empty
        </div>
    @endif
@endsection