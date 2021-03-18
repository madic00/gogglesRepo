<div class="banner-top container-fluid" id="home">
    <!-- header -->
    <header>
        <div class="row">
            <div class="col-md-4 top-info text-left mt-lg-4">
                <h6>Need Help</h6>
                <ul>
                    <li>
                        <i class="fas fa-phone"></i> Call</li>
                    <li class="number-phone mt-3">+121 098 8907 9987</li>
                </ul>
            </div>
            <div class="col-md-4 logo-w3layouts text-center">
                <h1 class="logo-w3layouts">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        Goggles </a>
                </h1>
            </div>

            <div class="col-md-4 top-info-cart text-right mt-lg-4">
                <ul class="cart-inner-info">

                    @if(session()->has('user'))

                    <li class="button-logout">
                        <a href="{{ route('logout') }}">Log out
                        </a>
                    </li>

                    @else

                    {{-- login button --}}
                    <li class="">
                        <a class="btn-open" href="{{ route('register') }}"> Register
                        </a>
                    </li>

                    <li class="">
                        <a class="btn-open" href="{{ route('login') }}"> Login
                        </a>
                    </li>

                    @endif

                    <li class="galssescart galssescart2 cart cart box_1">
                        {{-- <form action="#" method="post" class="last">
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="display" value="1"> --}}
                            <a class="top_googles_cart" href="{{ route('cart') }}">
                                My Cart
                                <i class="fas fa-cart-arrow-down"></i>
                            </a>
                        {{-- </form> --}}
                    </li>
                </ul>
                <!---->

                
            </div>
        </div>
    
        <label class="top-log mx-auto"></label>
        <nav class="navbar navbar-expand-lg navbar-light bg-light top-header mb-2">

            <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-mega mx-auto">

                    @foreach($menu as $link)
                        <li class="nav-item">
                            <a class="nav-link @if(request()->routeIs($link->route)) active @endif" href="{{ route($link->route )}}" >{{ $link->title }}</a>
                        </li>
                    @endforeach

                    @if(session()->has('user') && session()->get('user')->role_id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.home')}}" >Admin panel</a>
                        </li>
                    @endif          
                 
                </ul>

            </div>
        </nav>
    </header>
    <!-- //header -->