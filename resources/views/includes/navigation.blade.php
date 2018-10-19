<!-- Navigation -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container-fluid">

                <a class="navbar-brand w-100 order-1" href="{{ route('index') }}">
                    Droneland
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <form class="form w-50 order-2" >
                    <div class="input-group" id="searchBar">
                        <input class="form-control" type="text" placeholder="Search" aria-label="Search" id="globalSearch">
                        <div class="input-group-append">
                            <button class="btn btn-primary btn-sm" type="submit" id="search-btn"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

                <div class="collapse navbar-collapse w-100 order-3" id="navbarResponsive">

                            <ul class="navbar-nav ml-auto">

                                <li class="nav-item">
                                    <a class="nav-link" href="#">DE</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">EN</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="fa fa-video-camera"></i> Videos</a>
                                </li>

                                {{--<li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="fa fa-shopping-cart"></i>  Shopping Cart
                                    </a>
                                </li>--}}

                                <!-- yields only if the user is logged in -->
                                @if(Auth::check())
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>

                                    <li class="nav-item">
                                        <form method="POST" id="logout-form" action="{{ route('logout') }}">@csrf</form>
                                        <a class="nav-link" href="#" onclick="document.getElementById('logout-form').submit();">Logout</a>
                                    </li>

                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">
                                            <i class="fa fa-user"></i> Login</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">
                                            <i class="fa fa-user"></i> Register</a>
                                    </li>

                                @endif
                            </ul>
                        </div>

            </div> <!-- /.container-fluid -->
        </nav>

