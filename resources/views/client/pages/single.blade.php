@extends('client.layout')

@section('title') Goggles | Single Product @endsection

@section('keywords') goggles, optic store, sunglasses, eyeglasses, goggles eyeglasses @endsection
@section('description') Find information for specific product on this page. @endsection

@section('banner')

    @include('client.components.banner', ['bannerTitle' => "Product " . $product->name])

@endsection

@section('content')

    <section class="banner-bottom-wthreelayouts py-lg-5 py-3">
        <div class="container">
            <div class="inner-sec-shop pt-lg-4 pt-3">
                <div class="row">
                    <div class="alert alert-success" role="alert" id="addedToCartSuccess"> </div>

                        <div class="col-lg-4 single-right-left ">
                                <div class="grid images_3_of_2">
                                    <div class="flexslider1">
                
                                        <ul class="slides">
                                            <li data-thumb="{{ asset("assets/images/$product->name/$product->image") }}">
                                                <div class="thumb-image"> <img src="{{ asset("assets/images/$product->name/$product->image") }}" data-imagezoom="true" class="img-fluid" alt=" "> </div>
                                            </li>

                                            @php 
                                                $img2 = $product->images[0];

                                                $img3 = $product->images[1];
                                                
                                            @endphp

                                            <li data-thumb="{{ asset("assets/images/$product->name/$img2->image") }}">
                                                <div class="thumb-image"> <img src="{{ asset("assets/images/$product->name/$img2->image")}}" data-imagezoom="true" class="img-fluid" alt=" "> </div>
                                            </li>
                                            <li data-thumb="{{ asset("assets/images/$product->name/$img3->image") }}">
                                                <div class="thumb-image"> <img src="{{ asset("assets/images/$product->name/$img3->image")}}" data-imagezoom="true" class="img-fluid" alt=" "> </div>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 single-right-left simpleCart_shelfItem">
                                <h3>{{ $product->name }} / {{ $product->brand->brand_name }} / {{ $product->category->category_name }}</h3>
                                <p><span class="item_price">${{ $product->prices[count($product->prices) - 1]->price}}</span>
                                    {{-- <del>$1,199</del> --}}
                                </p>
                              
                                <div class="description">
                                    <p>{{ $product->description }} </p>
                                </div>
                  

                                @if(session()->has('user'))
                                    <div class="occasion-cart">
                                        <div class="googles single-item singlepage">
                                            <form action="#" method="post">
                                                
                                                <button type="button" class="googles-cart pgoogles-cart cartBtn" data-productid="{{ $product->id }}">
                                                    Add to cart
                                                </button>
                                                
                                            </form>

                                        </div>
                                    </div>
                                
                                @else
                                    <small>Log in to be able to add to cart!</small>
                                @endif  


                                <ul class="footer-social text-left mt-lg-4 mt-3">
                                        <li>Share On : </li>
                                        <li class="mx-2">
                                            <a href="https://www.facebook.com/" target="_blank">
                                                <span class="fab fa-facebook-f"></span>
                                            </a>
                                        </li>
                                        <li class="mx-2">
                                            <a href="https://www.twitter.com/" target="_blank">
                                                <span class="fab fa-twitter"></span>
                                            </a>
                                        </li>
                                    
                                        <li class="mx-2">
                                            <a href="https://www.linkedin.com/" target="_blank">
                                                <span class="fab fa-linkedin-in"></span>
                                            </a>
                                        </li>
                                        <li class="mx-2">
                                            <a href="#" target="_blank">
                                                <span class="fas fa-rss"></span>
                                            </a>
                                        </li>
                                        
                                    </ul>
        
                            </div>
                            <div class="clearfix"> </div>
                           
                </div>
            </div>
        </div>
            <div class="container-fluid">
                <!--/slide-->
                <div class="slider-img mid-sec mt-lg-5 mt-2 px-lg-5 px-3">
                    <!--//banner-sec-->
                    <h3 class="tittle-w3layouts text-left my-lg-4 my-3">Featured Products</h3>
                    <div class="mid-slider">
                        <div class="owl-carousel owl-theme row">
                           
                            @foreach($featured_products as $f_product) 
                                @include('client.components.featuredProduct')
                            @endforeach

                        </div>
                    </div>
                </div>
                <!--//slider-->
            </div>
    </section>


@endsection

@section('pageScripts')

    <!-- single -->
    <script src="{{ asset('assets/js/imagezoom.js') }}"></script>
    <!-- single -->

    <!-- script for responsive tabs -->
    <script src="{{ asset('assets/js/easy-responsive-tabs.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion           
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                activate: function (event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
            $('#verticalTab').easyResponsiveTabs({
                type: 'vertical',
                width: 'auto',
                fit: true
            });
        });
    </script>
    <!-- FlexSlider -->
    <script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function () {
            $('.flexslider1').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>
    <!-- //FlexSlider-->

    <script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    900: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: true,
                        loop: false,
                        margin: 20
                    }
                }
            })
        })
    </script>

@endsection