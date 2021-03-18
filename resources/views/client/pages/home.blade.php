@extends('client.layout')

@section('title') Goggles | Home @endsection

@section('keywords') goggles, optic store, sunglasses, eyeglasses, goggles eyeglasses @endsection
@section('description') Shop for high-quality glasses and sunglasses at Goggles.com, Starting at just $60. See our huge selection of prescription eyewear in our online store now. @endsection


@section('banner')
    
    <!-- banner -->
		<div class="banner">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner" role="listbox">

					@foreach($sliderImages as $slider)
						<div class="carousel-item @if($loop->index == 0) active @endif" style="background-image: url({{ asset('assets/images/' . $slider->image)}})">
							<div class="carousel-caption text-center">
								<h3>{{ $slider->heading}}
									<span>{{ $slider->subheading }}</span>
								</h3>
								<a href="{{ route('home.products') }}" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
							</div>
						</div>
					@endforeach

				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
			<!--//banner -->
		</div>
	</div>

@endsection

@section('content')

    <!--//banner-sec-->
	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container-fluid">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 my-4">New Arrivals for you </h3>
				<div class="row">

					@foreach($products as $product)
						@include('client.components.product')
					@endforeach

				</div>

				<!--/meddle-->
				<div class="row">
					<div class="col-md-12 middle-slider my-4">
						<div class="middle-text-info ">

							<h3 class="tittle-w3layouts two text-center my-lg-4 mt-3">Spring Flash sale</h3>
							<div class="simply-countdown-custom" id="simply-countdown-custom"></div>

						</div>
					</div>
				</div>
				<!--//meddle-->


				<!-- /testimonials -->
				<div class="testimonials py-lg-4 py-3 mt-4">
					<div class="testimonials-inner py-lg-4 py-3">
						<h3 class="tittle-w3layouts text-center my-lg-4 my-4">Tesimonials</h3>
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner" role="listbox">
								<div class="carousel-item active">
									<div class="testimonials_grid text-center">
										<h3>Gillian Swift
											<span>Customer</span>
										</h3>
										<label>United Kingdom</label>
										<p>I collected my new tortoiseshell glasses today in Meltham. Wonderful service, expert care & guidance from Cheryl & her team - Josie & Amy. Thank you</p>
									</div>
								</div>
								<div class="carousel-item">
									<div class="testimonials_grid text-center">
										<h3>Michelle Ross
											<span>Customer</span>
										</h3>
										<label>United States</label>
										<p>Well... I'd just like to say that Goggles Opticians in our little town are amazing. I didn't realise how much I was struggling with my eyesight and shonky gemms until my visit to them this afternoon. Awesome staff - thank you </p>
									</div>
								</div>
								<div class="carousel-item">
									<div class="testimonials_grid text-center">
										<h3>Amy Gault
											<span>Customer</span>
										</h3>
										<label>France</label>
										<p>I've got new glasses! Thanks to the lovely Sheryl and Amy at Goggles. It's like someone's turned the lights on! Lovely service, help choosing frames and getting the right deal, VERY covid aware a thoroughly lovely experience well worth the long journey I make</p>
									</div>
								</div>
								<a class="carousel-control-prev test" href="#carouselExampleControls" role="button" data-slide="prev">
									<span class="fas fa-long-arrow-alt-left"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next test" href="#carouselExampleControls" role="button" data-slide="next">
									<span class="fas fa-long-arrow-alt-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>

								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- //testimonials -->
				<div class="bottom-sub-grid-content py-lg-5 py-3">
					<div class="row">
						<div class="col-lg-4 bottom-sub-grid text-center">
							<div class="bt-icon">

								<span class="far fa-hand-paper"></span>
							</div>

							<h4 class="sub-tittle-w3layouts my-lg-4 my-3">Satisfaction Guaranteed</h4>
							<p>With our Total Satisfaction Guarantee, you can be certain you have a quality product at a great price, while enjoying the benefits of a free lifetime service for your glasses.</p>
							<p>
								<a href="{{ route('home.products') }}" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
							</p>
						</div>
						<!-- /.col-lg-4 -->
						<div class="col-lg-4 bottom-sub-grid text-center">
							<div class="bt-icon">
								<span class="fas fa-rocket"></span>
							</div>

							<h4 class="sub-tittle-w3layouts my-lg-4 my-3">Fast Shipping</h4>
							<p>Once you've selected your frames, get ready to wear your perfect pair of glasses, because they are 2-4 days ahead your home.</p>
							<p>
								<a href="{{ route('home.products') }}" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
							</p>
						</div>
						<!-- /.col-lg-4 -->
						<div class="col-lg-4 bottom-sub-grid text-center">
							<div class="bt-icon">
								<span class="far fa-sun"></span>
							</div>

							<h4 class="sub-tittle-w3layouts my-lg-4 my-3">UV Protection</h4>
							<p> The effect of UV light on our eyes and the danger of damage from UV radiation grows the more time we spend in the sun throughout our lives.</p>
							<p>
								<a href="{{ route('home.products') }}" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
							</p>
						</div>
						<!-- /.col-lg-4 -->
					</div>
				</div>
				<!-- //grids -->
		
			</div>
		</div>
	</section>

@endsection

@section("pageScripts")

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center p-5 mx-auto mw-100">
					<h6>Join our newsletter and get</h6>
					<h3>50% Off for your first Pair of Eye wear</h3>
					<div class="login newsletter">
						<form action="#" method="post">
							<div class="form-group">
								<label class="mb-2">Email address</label>
								<input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="" required="">
							</div>
							<button type="submit" class="btn btn-primary submit mb-4">Get 50% Off</button>
						</form>
						<p class="text-center">
							<a href="#">No thanks I want to pay full Price</a>
						</p>
					</div>
				</div>

			</div>
		</div>
	</div>
	<script>
		$(document).ready(function () {
			// $("#myModal").modal();
		});
	</script>
	<!-- // modal -->

	<!-- Count-down -->
	<script src="{{ asset('assets/js/simplyCountdown.js')}}"></script>
	<link href="{{ asset('assets/css/simplyCountdown.css') }}" rel='stylesheet' type='text/css' />
	<script>
		var d = new Date();
		simplyCountdown('simply-countdown-custom', {
			year: d.getFullYear(),
			month: d.getMonth() + 2,
			day: 25
		});
	</script>
	<!--// Count-down -->

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

	<!-- //end-smooth-scrolling -->

@endsection