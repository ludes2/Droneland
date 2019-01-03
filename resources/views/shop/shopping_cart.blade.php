@extends('layouts.master')

@section('title') @lang('messages.shopping_cart') @endsection

@section('content')

<div class="content py-5">
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light" id="shoppingCartHeader">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            @lang('messages.shopping_cart')
            <a id="shoppingCardLabel" href="{{ route('index') }}" class="btn btn-outline-info btn-sm pull-right">@lang('messages.cont_shopping')</a>
            <div class="clearfix"></div>
        </div> <!-- end of card-header -->

        <form method="GET" id="cart_quantity" action="{{ route('refreshCart') }}">@csrf
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
                                <input type="number" step="1" max="99" min="1" value="{{ $product['quantity'] }}" name="quantity_of_{{ $product['item']['id'] }}" class="qty" size="4">
                            </div>
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-right pt-2">
                            {{--<form method="GET" id="product-{{ $product['item']['id'] }}" action="{{ route('removeFromCart', $product['item']['id']) }}">@csrf--}}
                            <a href="{{ route('removeFromCart', $product['item']['id']) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            {{--</form>--}}
                        </div>
                    </div>
                </div> <!-- end of row -->
                @endforeach
                <hr>
                <!-- END OF PRODUCTS -->

                <div class="text-right">
                    <button onclick="document.getElementById('cart_quantity').submit();" class="btn btn-outline-secondary">
                        @lang('messages.update_cart')
                    </button>
                </div> <!-- end of pull-right button "update shopping cart" -->



                </div> <!-- end of card-body -->

            <div class="card-footer text-right">
                <div class="row">
                    <div class="col-10">
                        @lang('messages.total_price')<b>{{ number_format($totalPrice, 0, ',', "'") }}</b>
                    </div>
                    <div class="col">
                        <a href="{{ route('checkout') }}" class="btn btn-primary">@lang('messages.checkout')</a>
                    </div>
                </div>
            </div> <!-- end of card-footer -->

            @else
                <div class="row">
                    @lang('messages.empty_cart')
                </div>
            @endif

        </form> <!-- end of form cart_quantity -->
    </div> <!-- end of shopping cart -->
</div> <!-- end of content -->
@endsection
