@extends('client.layout')

@section('title') Goggles | Shop @endsection

@section('keywords') goggles, optic store, sunglasses, eyeglasses, goggles eyeglasses @endsection
@section('description') Shop for high-quality glasses and sunglasses at Goggles.com, Starting at just $60. See our huge selection of prescription eyewear in our online store now. @endsection

@section('banner')

	@include('client.components.banner', ['bannerTitle' => "Shop"])

@endsection

@section('content')

    <!--/shop-->
		<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
			<div class="container-fluid">
				<div class="inner-sec-shop px-lg-4 px-3">
					<h3 class="tittle-w3layouts my-lg-4 mt-3">New Arrivals for you </h3>

					<div class="alert alert-success" role="alert" id="addedToCartSuccess">

					</div>

					<div class="row">
						<!-- product left -->
						<div class="side-bar col-lg-3">
							{{-- <form action="#" method="post"> --}}
							<div class="search-hotel">
								<h3 class="agileits-sear-head">Search Here..</h3>
									<form action="" method="post">

									<input class="form-control" type="search" name="keyword" id="keyword" placeholder="Search here..." required="" />
									<button type="button" class="btn1">
											<i class="fas fa-search"></i>
									</button>
									<div class="clearfix"> </div>
							</div>
							<!-- price range -->
							{{-- <div class="range">
								<h3 class="agileits-sear-head">Price range</h3>
								<ul class="dropdown-menu6">
									<li>

										<div id="slider-range"></div>
										<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
									</li>
								</ul>
							</div> --}}
							<!-- //price range -->

							<!-- sort -->
							<div class="sort">
								<h3 class="agileits-sear-head">Choose sort:</h3>
								<select class="form-control" id="sort">
									<option value="n_asc">Name: A-Z</option>
									<option value="n_desc">Name: Z-A</option>
									<option value="p_asc">Price: Low to High</option>
									<option value="p_desc">Price: High to Low</option>
								</select>
							</div>
							<!-- //sort -->

							<!--preference -->
							<div class="left-side">
								<h3 class="agileits-sear-head">Gender</h3>
								<ul>
									<li>
										<input type="radio" name="gender" class="checked" value="10">
										<span class="span">All</span>
									</li>
									<li>
										<input type="radio" name="gender" class="checked" value="1">
										<span class="span">Male</span>
									</li>
									<li>
										<input type="radio" name="gender" class="checked" value="0">
										<span class="span">Female</span>
									</li>

								</ul>
							</div>
							<!-- // preference -->
							<!-- discounts -->
							<div class="left-side">
								<h3 class="agileits-sear-head">Categories</h3>
								{{-- <form action="" method="get"> --}}
									<ul>
										@foreach($categories as $category)
											<li>
												<input type="checkbox" class="checked" name="category_ids[]" value="{{ $category->id }}" />
												<span class="span">{{ $category->category_name }}</span>
											</li>

										@endforeach
										{{-- <li>
											<input type="checkbox" class="checked" />
											<span class="span">5% or More</span>
										</li> --}}
										
									</ul>

							</div>
							<!-- //discounts -->
							<!-- brands -->
							<div class="customer-rev left-side">
								<h3 class="agileits-sear-head">Brands</h3>
								{{-- <form action="" method="get"> --}}
									<ul>
										@foreach($brands as $brand)
											<li>
												<input type="checkbox" class="checked" name="brand_ids[]" value="{{ $brand->id }}" />
												<span class="span">{{ $brand->brand_name }}</span>
											</li>

										@endforeach
										{{-- <li>
											<input type="checkbox" class="checked" />
											<span class="span">5% or More</span>
										</li> --}}
										
									</ul>

								
							</div>
							<!-- //brands -->

							<input type="button" id="submitFilters" name="submitFilters" class="btn btn-orange mt-4" value="Apply" />

							</form>
					
						</div>
						<!-- //product left -->
						<!--/product right-->
						<div class="left-ads-display col-lg-9">
							<div class="wrapper_top_shop">
								
								<div class="row" id="products">

									@foreach($products as $product)
										@include('client.components.product')
									@endforeach

								</div>
								
								{{ $products->links('vendor.pagination.bootstrap-4') }}

							</div>
						</div>
						<!--//product right-->
					</div>
					<!--/slide-->
				<div class="slider-img mid-sec mt-lg-5 mt-2">
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
			</div>
		</section>

@endsection

@section('pageScripts')

    <!-- price range (top products) -->
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script>
        //<![CDATA[ 
        $(window).load(function () {
            $("#slider-range").slider({
                range: true,
                min: 0,
                max: 9000,
                values: [50, 6000],
                slide: function (event, ui) {
                    $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

        }); //]]>
    </script>
    <!-- //price range (top products) -->

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