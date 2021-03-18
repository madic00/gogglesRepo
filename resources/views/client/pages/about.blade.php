@extends('client.layout')

@section('title') Goggles | About us @endsection

@section('keywords') goggles, about us, about goggles, optic store, sunglasses, eyeglasses, goggles eyeglasses @endsection
@section('description') Shop for high-quality glasses and sunglasses at Goggles.com. Find more information about us.  @endsection

@section('banner')

    @include('client.components.banner', ['bannerTitle' => "About"])

@endsection

@section('content')

    <section class="banner-bottom-wthreelayouts py-lg-5 py-3">
        <div class="container-fluid">

            <div class="inner-sec-shop px-lg-4 px-3">
                <div class="about-content py-lg-5 py-3">
                    <div class="row">

                        <div class="col-lg-6 p-0">
                            <img src="{{ asset('assets/images/banner1.jpg')}}" alt="Goggles" class="img-fluid">
                        </div>
                        <div class="col-lg-6 about-info">
                            <h3 class="tittle-w3layouts text-left mb-lg-5 mb-3">About Us</h3>
                            <p class="my-xl-4 my-lg-3 my-md-4 my-3"> The Goggles is dedicated to providing you with the highest standards of professional eye care, together with a friendly service, quality products and excellent value. As an established independent opticians, we are free to select the best products from any manufacturer. This means we are able to offer you a wide choice of eyewear with quality frames. Our commitment to quality extends to the people who look after your eyesight. 
                            </p>

                            <a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>

                        </div>
                    </div>
                </div>
               

                
                <!-- /grids -->
                <div class="bottom-sub-grid-content py-lg-5 py-3">
                    <div class="row">
                        <div class="col-lg-4 bottom-sub-grid text-center">
                            <div class="bt-icon">

                                <span class="far fa-hand-paper"></span>
                            </div>

                            <h4 class="sub-tittle-w3layouts my-lg-4 my-3">Satisfaction Guaranteed</h4>
                            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                            <p>
                                <a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
                            </p>
                        </div>
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-4 bottom-sub-grid text-center">
                            <div class="bt-icon">
                                <span class="fas fa-rocket"></span>
                            </div>

                            <h4 class="sub-tittle-w3layouts my-lg-4 my-3">Fast Shipping</h4>
                            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                            <p>
                                <a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
                            </p>
                        </div>
                        <!-- /.col-lg-4 -->
                        <div class="col-lg-4 bottom-sub-grid text-center">
                            <div class="bt-icon">
                                <span class="far fa-sun"></span>
                            </div>

                            <h4 class="sub-tittle-w3layouts my-lg-4 my-3">UV Protection</h4>
                            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
                            <p>
                                <a href="shop.html" class="btn btn-sm animated-button gibson-three mt-4">Shop Now</a>
                            </p>
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                </div>
                <!-- //grids -->
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

            </div>
        </div>
    </section>

@endsection

@section('pageScripts')

    <!-- Count-down -->
    <script src="{{ asset('assets/js/simplyCountdown.js') }}"></script>
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

@endsection