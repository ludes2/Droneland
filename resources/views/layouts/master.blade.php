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

  {{-- <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js') }}"></script>--}}


</head>

<body>

@include('includes.navigation')

<div class="container-fluid py-5" id="mainContainer">
    @yield('content')
</div>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- custom scripts -->



<!-- INCLUDE SCRIPTS OF SUB VIEWS -->
@stack('scripts')

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

</body>

</html>