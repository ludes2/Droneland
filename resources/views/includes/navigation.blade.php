<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <div class="container-fluid">

        <a class="navbar-brand w-100 order-1" href="{{ route('index') }}">
            Droneland
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <button type="button" id="btn_adv_search" class="btn btn-primary order-2" data-toggle="modal" data-target="#exampleModalCenter">
            @lang('messages.advanced_search')
        </button>

        <!-- SEARCH FORM -->
        <form class="form w-50 order-3" id="searchForm">
            <div class="input-group" id="searchBar">
                <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="globalSearch">
                <div class="input-group-append">
                    <button class="btn btn-primary btn-sm" type="submit" id="search-btn"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>

        <div class="collapse navbar-collapse w-100 order-4" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="locale/de">DE</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="locale/en">EN</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-video-camera"></i> Videos</a>
                </li>


                <!-- yields only if the user is logged in -->
                @if(Auth::check())
                    @if(Auth::user()->admin == true)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('adminDashboard') }}">
                                <i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('myAccount') }}">
                                <i class="fa fa-user"></i> Account</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('myAccount') }}">
                                <i class="fa fa-user"></i> Account</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <form method="POST" id="logout-form" action="{{ route('logout') }}">@csrf</form>
                        <a class="nav-link" href="#" onclick="document.getElementById('logout-form').submit();">@lang('messages.logout')</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa fa-user"></i> @lang('messages.login')</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="fa fa-user"></i> @lang('messages.register')</a>
                    </li>
                @endif
            </ul>
        </div>
    </div> <!-- /.container-fluid -->

</nav>

<!-- Modal FOR SEARCH RESULTS-->
<div class="row">
    <div class="col mx-auto px-5">
        <div class="modal fade" id="searchResults" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="row">
                            <div class="col-6">
                                <h6 class="modal-title" id="exampleModalLabel">@lang('messages.search_products_by_name')</h6>
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
                        <!-- SEARCH RESULTS ARE SHOWN HERE VIA AJAX -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ROW MODAL SEARCH RESULTS -->

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
                                        <label for="inputBrand">@lang('messages.brand')</label>
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
                                        <label for="inputCategory">@lang('messages.category')</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Please select</button>
                                                <div id="dropdownCategories" class="dropdown-menu dropdownCategories">
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
                                        <label for="inputTitle">@lang('messages.title')</label>
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
                                        <label for="maxPrice">max @lang('messages.price'): <span id="price"></span></label>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('messages.cancel')</button>
                            <button type="button" class="btn btn-primary">@lang('messages.search')</button>
                        </div>
                    </div>
                </div>
            </div>


        </form> <!-- FORM ADVANCED SEARCH -->

    </div>

</div> <!-- ROW MODAL ADVANCED SEARCH -->

@push('scripts')
    <script>
    $(document).ready(function () {

        submitSearch();

        liveSearch();


        /* when the form is submitted, search and display products found for the given input */
        function submitSearch() {
            $('#globalSearch').submit(function (event) {
                event.preventDefault(); // ensures that found products stay visible

                var submitValue = document.getElementById('globalSearch').value;

                $.ajax({
                    method: 'GET',
                    url: '{{ route('searchProduct') }}',
                    //dataType: 'json',
                    data: {'search': submitValue},
                    success: function( data ) {

                        // parse the search results from "searchController" into a JS object and format the output.
                        var searchResult = JSON.parse(data);

                        var output = '';
                        output += "<div class='row'>";

                        // display each product in a card
                        for( var i = 0; i < searchResult.length; i++ ){
                            output += "<div class='col-lg-4 col-md-6 mb-4'>";
                            output += "<div class='card bg-transparent h-80 productCard'>";
                            output += "<div class='card-header'>";
                            output += "<h4 class='card-title'>";
                            output += "<a href=''>" + searchResult[i].title + "</a>";
                            output += "</h4>";
                            output += "</div>"; // CARD-HEADER
                            output += "<div class='card-body'>";
                            output += "<a href=''><img class='card-img-top' src=" + searchResult[i].thumbnail + "></a>";
                            output += "<p class='card-text'>" + searchResult[i].short_description + "</p>";
                            output += "</div>"; // CARD-BODY
                            output += "<div class='card-footer'>";
                            output += "<a>" + searchResult[i].price + "</a>";
                            output += "<a id="+ searchResult[i].id +" href='/add_to_cart/"+ searchResult[i].id +"' class='btn btn-primary pull-right' role='button'>" + "@lang('messages.add_to_cart')" + "</a>";
                            output += "</div>"; // CARD-FOOTER
                            output += "</div>"; // CARD
                            output += "</div>"; // COL
                        }
                        output += "</div>"; // ROW

                        $('#searchResultsContent').html(output);
                    },
                    error: function( req, status, err ) {

                        // will be changed to display nice form that product not found
                        console.log( 'something went wrong', status, err );
                    }
                });
            })
        }

        function liveSearch() {
            $('#productSearch').on('keyup', function () {

                var value = document.getElementById('productSearch').value;

                if(value.length == 0){
                    $('#searchResultsContent').html("");
                    return;
                } else {
                    $.ajax({
                        method: 'GET',
                        url: '{{ route('searchProduct') }}',
                        //dataType: 'json',
                        data: {'search': value},
                        success: function( data ) {

                            // parse the search results from "searchController" into a JS object and format the output.
                            var searchResult = JSON.parse(data);

                            var output = '';
                            output += "<div class='row'>";

                            // display each product in a card
                            for( var i = 0; i < searchResult.length; i++ ){
                                output += "<div class='col-lg-4 col-md-6 mb-4'>";
                                output += "<div class='card bg-transparent h-80 productCard'>";
                                output += "<div class='card-header'>";
                                output += "<h4 class='card-title'>";
                                output += "<a href=''>" + searchResult[i].title + "</a>";
                                output += "</h4>";
                                output += "</div>"; // CARD-HEADER
                                output += "<div class='card-body'>";
                                output += "<a href=''><img class='card-img-top' src=" +"/" + searchResult[i].thumbnail + "></a>";
                                output += "<p class='card-text'>" + searchResult[i].short_description + "</p>";
                                output += "</div>"; // CARD-BODY
                                output += "<div class='card-footer'>";
                                output += "<a>" + searchResult[i].price + "</a>";
                                output += "<a id="+ searchResult[i].id +" href='/add_to_cart/"+ searchResult[i].id +"' class='btn btn-primary pull-right' role='button'>" + "@lang('messages.add_to_cart')" + "</a>";
                                output += "</div>"; // CARD-FOOTER
                                output += "</div>"; // CARD
                                output += "</div>"; // COL
                            }
                            output += "</div>"; // ROW

                            $('#searchResultsContent').html(output);
                        },
                        error: function( req, status, err ) {

                            // will be changed to display nice form that product not found
                            console.log( 'something went wrong', status, err );
                        }
                    });
                }
                //if(value.length > 0){
                //}
            })
        }


        // show chosen category from dropdown in input field
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
        });

    });
</script>
    @endpush







