@extends('layouts.master')

@section('title') The Shop - Home @endsection

@section('content')
<div class="row text-right pt-5">
    <div class="sidebar-header col-sm-3 pl-5 text-left">
        <h3>@lang('messages.products') <a href="#" data-target="#sidebar" data-toggle="collapse"><i class="fa fa-navicon"></i></a></h3>
    </div>
    <div class="col-sm-9 pr-5">
        <a id="shoppingCardLabel" href="{{ route('shoppingCart') }}">
            <i class="pt-4 fa fa-shopping-cart"></i>  @lang('messages.shopping_cart')
            <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQuantity : '' }}</span>
        </a>
    </div>
</div>



<!-- SIDE NAVIGATION -->
<div class="row">
    <div class="col-3">
        <div class="collapse show" id="sidebar">
            <ul class="sieNavigation list-unstyled">
                @each('partials.sideNavigation', $categories, 'category')
            </ul>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="col-9 mx-auto px-5">
        <!-- BESTSELLER CARD-CAROUSEL -->
        <div class="row my-2" id="bestseller">
            <div class="col">
                <div class="card bg-transparent">
                    <div class="card-header">
                        <h4 class="card-title">
                            <a href="#">Bestseller</a>
                        </h4>
                    </div><!-- CARD-HEADER-->
                    <div class="card-body">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner row w-100 mx-auto">

                                <div class="carousel-item col-md-4 active">
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="http://placehold.it/800x600/f44242/fff" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Card 1</h4>
                                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item col-md-4 ">
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="http://placehold.it/800x600/418cf4/fff" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Card 2</h4>
                                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item col-md-4 ">
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="http://placehold.it/800x600/3ed846/fff" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Card 3</h4>
                                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item col-md-4 ">
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="http://placehold.it/800x600/42ebf4/fff" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Card 4</h4>
                                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item col-md-4 ">
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="http://placehold.it/800x600/f49b41/fff" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">Card 5</h4>
                                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a> <!-- CAROUSEL-CONTROL-PREV -->
                            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a> <!-- CAROUSEL-CONTROL-NEXT -->
                        </div>

                    </div> <!-- CARD-BODY-->
                </div> <!-- CARD -->
            </div> <!-- COL -->
        </div> <!-- ROW BESTSELLER -->

        <!-- EINKAUFSGUIDE -->
        <div class="row my-2" id="guide">
            <div class="col">
                <div class="card bg-transparent">
                    <div class="card-header">
                        <h4 class="card-title">
                            <a href="#">Einkaufsguide</a>
                        </h4>
                    </div><!-- CARD-HEADER-->
                    <div class="card-body">
                        <h5>Einstieg in das FPV Racing / Drone Racing - grundsätzliche Möglichkeiten</h5>
                        <p>Für den Einsteiger stellt sich die Frage, ob man seinen Racing Quadcopter selbst zusammenbauen und tunen möchte, oder ob man auf einen bereits gebautes und eingestelltes Modell zurückgreifen möchten.</p>
                        <p>Beide Möglichkeiten haben Ihre Vor- und Nachteile:</p>

                        <div class="row">
                            <div class="col">
                                <h6>Variante Eigenbau</h6>
                            </div>
                            <div class="col">
                                <h6>Variante flugfertige FPV Racer</h6>
                            </div>
                        </div>

                    </div> <!-- CARD-BODY-->
                </div> <!-- CARD -->
            </div> <!-- COL -->
        </div> <!-- ROW GUIDE -->
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
