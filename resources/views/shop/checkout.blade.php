@extends('layouts.master')

@section('title') Checkout @endsection

@section('content')

    <div class="content py-5">
        <form class="needs_validation" action="{{ route('saveOrder') }}" method="POST" id="checkoutForm" novalidate>
            @csrf
            <div class="card shopping-cart">
                <div class="card-header bg-dark text-light" id="checkoutHeader">
                    Checkout
                    <a href="{{ route('shoppingCart') }}" class="btn btn-outline-info btn-sm pull-right">@lang('messages.back_to_shopping_cart')</a>
                    <div class="clearfix"></div>
                </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control" required>
                                            <div class="invalid-feedback">
                                                @lang('messages.enter_name')
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- name field -->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="address">@lang('messages.address')</label>
                                            <input type="text" id="address" name="address" class="form-control" required>
                                            <div class="invalid-feedback">
                                                @lang('messages.enter_address')
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Address field -->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="card_holder_name">@lang('messages.card_holder_name')</label>
                                            <input type="text" id="card_holder_name" name="card_holder_name" class="form-control" required>
                                            <div class="invalid-feedback">
                                                @lang('messages.enter_card_holder_name')
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Card Holder Name field -->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="card_number">@lang('messages.card_number')</label>
                                            <div class="input-group">
                                                <input type="text" id="card_number" name="card_number" class="form-control" required>
                                                <div class="invalid-feedback">
                                                    @lang('messages.enter_card_name')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Card Number field -->
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-4 col-sm-4 col-md-4">
                                                    <label for="card_expiration_date">@lang('messages.exp_month')</label>
                                                    <div class="input-group">
                                                        <input type="text" id="exp_month" class="form-control" required>
                                                        <div class="invalid-feedback">
                                                            @lang('messages.enter_exp_month')
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 col-sm-4 col-md-4">
                                                    <label for="card_expiration_date">@lang('messages.exp_year')</label>
                                                    <div class="input-group">
                                                        <input type="text" id="exp_year" class="form-control" required>
                                                        <div class="invalid-feedback">
                                                            @lang('messages.enter_exp_year')
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-4 col-sm-4 col-md-4">
                                                    <label for="card_cvc">CVC</label>
                                                    <div class="input-group">
                                                        <input type="text" id="card_cvc" class="form-control" required>
                                                        <div class="invalid-feedback">
                                                            @lang('messages.enter_cvc')
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- Expiration fields and CVC -->
                            </div>
                            <div class="col-6 col-sm-6 col-md-6">
                                <h4>@lang('messages.purchase')</h4>
                                <table class="table table-sm text-center">
                                    <thead>
                                    <tr>
                                        <th class="text-left" scope="col">@lang('messages.product')</th>
                                        <th scope="col">@lang('messages.price')</th>
                                        <th scope="col">@lang('messages.quantity')</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                       <tr>
                                           <td class="text-left">{{ $product['item']['title'] }}</td>
                                           <td>{{ number_format($product['item']['price'], 0, ',', "'") }}.-</td>
                                           <td>{{ $product['quantity'] }}</td>
                                           <td>{{ number_format($product['price'], 0, ',', "'") }}.-</td>
                                       </tr>
                                    @endforeach
                                    </tbody>
                                    <tr>
                                        <td class="text-right" colspan="4"><b>@lang('messages.amount_to_pay') {{ number_format($total, 0, ',', "'") }}.-</b></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                <div class="card-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary pull-right">@lang('messages.buy_now')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        // JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs_validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
    </script>


@endsection