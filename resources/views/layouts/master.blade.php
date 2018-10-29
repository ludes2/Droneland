<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('assets/css/shop-homepage.css') }}" rel="stylesheet">

    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>



</head>



<body>

@include('includes.navigation')


<div class="container-fluid py-3" id="mainContainer">
    @yield('content')
</div>







<!-- Footer -->
<footer class="py-3 bg-dark">
    <div class="container">

        <div class="row  justify-content-center">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a class="nav-link footerLink text-muted" href="{{ route('index') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link footerLink text-muted" href="{{ route('about') }}">About</a>
                </li>
                <li class="list-inline-item">
                    <a class="nav-link footerLink text-muted" href="{{ route('contact') }}">@lang('messages.contact')</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
              </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
              </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-github fa-stack-1x fa-inverse"></i>
              </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</footer>






{{--<!-- Bootstrap core JavaScript -->
<script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}

</body>


<!-- TEST SCRIPT FOR AJAX LIVE SEARCH -->
<script>
    $(document).ready(function () {

        //submitSearch();

        liveSearch();


        /* when the form is submitted, search and display products found for the given input */
        function submitSearch() {
            $('#globalSearch').submit(function (event) {
                event.preventDefault(); // ensures that found products stay visible

                var submitValue = document.getElementById('globalSearch').value;

                $.ajax({
                    method: 'GET',
                    url: '{{ route('searchProduct') }}',
                    data: {'search': submitValue},
                    success: function( data ) {
                        //$('#searchResultsContent').html(data);

                        // parse the search results from "searchController" into a JS object and format the output.
                        var searchResult = JSON.parse(data);
                        var output = '';
                        output += "<div class='row'>";

                        // display each product in a card
                        for( var i = 0; i < searchResult.length; i++ ){
                            output += "<div class='col-lg-3 col-md-6 mb-3'>";
                            output += "<div class='card bg-transparent h-100 productCard'>";
                            output += "<div class='card-header'>";
                            output += "<h4 class='card-title'>";
                            output += "<a href=''>" + searchResult[i].title + "</a>";
                            output += "</h4>";
                            output += "</div>"; // CARD-HEADER
                            output += "<div class='card-body'>";
                            output += "<a href='#'><img class='card-img-top' src=" + searchResult[i].thumbnail + "></a>";
                            output += "<p class='card-text'>" + searchResult[i].short_description + "</p>";
                            output += "</div>"; // CARD-BODY
                            output += "<div class='card-footer'>";
                            output += "<a>" + searchResult[i].price + "</a>";
                            output += "<a href='#' class='btn btn-primary pull-right' role='button'>" + "Add to Cart" + "</a>";
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
                //event.preventDefault();
                //$('#searchResults').modal('show');

                //$('#bestseller').addClass('d-none'); // hide jumbotron when typing
                //$('#searchResults').removeClass('d-none'); // show searchResults when typing

                var value = document.getElementById('productSearch').value;
                if(value.length > 0){
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
                                output += "<a href=''><img class='card-img-top' src=" + searchResult[i].thumbnail + "></a>";
                                output += "<p class='card-text'>" + searchResult[i].short_description + "</p>";
                                output += "</div>"; // CARD-BODY
                                output += "<div class='card-footer'>";
                                output += "<a>" + searchResult[i].price + "</a>";
                                output += "<a href='#' class='btn btn-primary pull-right' role='button'>" + "Add to Cart" + "</a>";
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

            })
        }
    });


</script>

</html>