@extends('layouts.master')

@section('title') The Shop - Home @endsection



@section('content')
<!-- Page Content -->

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

<div class="row">
    <div class="collapse show" id="sidebar">
            <ul class="sieNagivation list-unstyled">
                @each('partials.sideNavigation', $categories, 'category')
            </ul>
    </div>

    <!-- BESTSELLER CARD-CAROUSEL -->
    <div class="col mx-auto px-5" id="bestseller">
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
    </div>






<div class="row">
    <div class="col mx-auto px-5">
        <!-- Modal FOR SEARCH RESULTS-->
        <div class="modal fade" id="searchResults" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-6">
                                <h6 class="modal-title" id="exampleModalLabel">Search Products by name</h6>
                            </div>
                            <div class="col-6 w-100 pull-right">
                                <form>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="productSearch">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary btn-sm" type="submit" id="search-btn"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="searchResultsContent">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







{{--    <div class="col mx-auto px-5 d-none"  id="searchResults">
    @if(isset($products_found))
        @include('shop.search_results')
    @endif
    </div>--}}


</div> <!-- end of row -->

<!-- MODAL ADVANCED SEARCH -->
<div class="row">
    <div class="col">
        <form action="#">

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Search for ...</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="inputBrand">Hersteller</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Please select</button>
                                                <div class="dropdown-menu">
                                                    <a id="action" class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </div>
                                            <input id="inputBrand" type="text" class="form-control" aria-label="Text input with dropdown button">
                                        </div>
                                    </div> <!-- FORM-GROUP Brandname -->
                                </div> <!-- COL -->
                                <div class="col">
                                    <div class="form-group">
                                        <label for="inputCategory">Category</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Please select</button>
                                                <div id="dropdownCategories" class="dropdown-menu">
                                                    @foreach($categories as $category)
                                                    <a id="{{ $category->id }}" class="dropdown-item" href="#">{{ $category->name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <input id="inputCategory" type="text" class="form-control" aria-label="Text input with dropdown button">
                                        </div>
                                    </div> <!-- FORM-GROUP Category -->
                                </div> <!-- COL -->
                            </div> <!-- ROW -->
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="inputTitle">Product Title</label>
                                        <div class="input-group">
                                            <input id="inputTitle" type="text" class="form-control" aria-label="Text input with dropdown button">
                                        </div>
                                    </div> <!-- FORM-GROUP TITLE -->
                                </div> <!-- COL -->
                                <?php
                                foreach ($products as $product) { $prices[] = $product->price; }
                                ?>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="maxPrice">max Price: <span id="price"></span></label>
                                        <!-- <div class="input-group"> -->
                                        <div class="slideContainer">
                                            <input id="maxPrice" type="range" min="1" max="{{ max($prices) }}" value="1" class="slider">
                                        </div>
                                        <!-- </div> -->
                                    </div> <!-- FORM-GROUP Price -->
                                </div> <!-- COL -->
                            </div> <!-- ROW -->




                        </div> <!-- MODAL-BODY -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>


        </form> <!-- FORM ADVANCED SEARCH -->

    </div>

</div> <!-- ROW MODAL ADVANCED SEARCH -->

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


        $('#dropdownCategories').on('click', "a", function () {
           $('#inputCategory').attr('value', $(this).text());
        });

        const formatter = new Intl.NumberFormat('de-CH', {
           style: 'currency',
            currency: 'CHF',
            minimumFractionDigits: 2
        });

        var slider = document.getElementById("maxPrice");
        var output = document.getElementById("price");
        output.innerHTML = formatter.format(slider.value); // Display the default slider value

        // Update the current slider value (each time you drag the slider handle)
        slider.oninput = function() {
            output.innerHTML = formatter.format(this.value);
        }


        // open bootstrap modal when clicking on the search input field
        $('#globalSearch').on('click', function () {
            $('#searchResults').modal('show');
        });

        // focus on input as soon as modal "searchResults" is shown
        $('#searchResults').on('shown.bs.modal', function () {
            $('#productSearch').trigger('focus')
        })

    </script>



@endsection
