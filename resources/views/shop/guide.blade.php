@extends('layouts.master')

@section('title') The Shop - Home @endsection

@section('content')
    {{--<div class="row text-right pt-5">
        <div class="sidebar-header col-sm-3 pl-5 text-left">
            <h3>@lang('messages.products') <a href="#" data-target="#sidebar" data-toggle="collapse"><i class="fa fa-navicon"></i></a></h3>
        </div>
        <div class="col-sm-9 pr-5">
            <a id="shoppingCardLabel" href="{{ route('shoppingCart') }}">
                <i class="pt-4 fa fa-shopping-cart"></i>  @lang('messages.shopping_cart')
                <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span>
            </a>
        </div>
    </div>--}}



    <!-- SIDE NAVIGATION -->
    <div class="row pt-5">
    {{--<div class="col-3">
        <div class="collapse show" id="sidebar">
            <ul class="sieNavigation list-unstyled">
                @each('partials.sideNavigation', $categories, 'category')
            </ul>
        </div>
    </div>--}}

    <!-- CONTENT -->
        <div class="col-9 mx-auto px-5">
            <div class="row my-2" id="faq">
                Guide here
            </div>
        </div> <!-- COL-9 -->


    </div> <!-- end of row -->

@endsection

@push('scripts')
    <script>
        /* Function for Besteller Carousel */
        $("#myCarousel").on("slide.bs.carousel", function(e) {
            var e = $(e.relatedTarget); // get the secondary target for the event
            var index = e.index(); // get next index
            var itemsPerSlide = 3;
            var totalItems = $(".carousel-item").length;

            // make the carousel turn around
            if (index >= totalItems - (itemsPerSlide - 1)) {
                var it = itemsPerSlide - (totalItems - index);
                for (var i = 0; i < it; i++) {
                    // append slides to end
                    if (e.direction == "left") {
                        $(".carousel-item")
                            .eq(i) // Reduce the set of matched elements to the one at the specified index.
                            .appendTo(".carousel-inner");
                    } else {
                        $(".carousel-item")
                            .eq(0)
                            .appendTo($(this).find(".carousel-inner"));
                    }
                }
            }
        });
    </script>
@endpush
