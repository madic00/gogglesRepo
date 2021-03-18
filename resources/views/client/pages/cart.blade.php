@extends('client.layout')

@section('title') Goggles | Shopping cart @endsection

@section('keywords') goggles, goggles cart, optic store, sunglasses, eyeglasses, goggles eyeglasses @endsection
@section('description') Find products you added to cart on this page. @endsection

@section('banner')

	@include('client.components.banner', ['bannerTitle' => "Cart"])

@endsection

@section('content')

	<section class="banner-bottom-wthreelayouts py-lg-5 py-3">
		<div class="container">
			<div class="inner-sec-shop px-lg-4 px-3">
				<h3 class="tittle-w3layouts my-lg-4 mt-3">Cart </h3>

				<div class="alert alert-success" role="alert" id="orderSuccess">
				</div>

				<div id="cartDiv">
					@if(count($products) > 0)
						<div class="checkout-right">
	
							<h4>Your shopping cart contains:
								<span>{{ count($products) }} Products</span>
							</h4>
	
							<table class="timetable_sub">
								<thead>
									<tr>
										<th>SL No.</th>
										<th>Product</th>
										<th>Quantity</th>
										<th>Product Name</th>
	
										<th>Price</th>
										<th>Remove</th>
									</tr>
								</thead>
								<tbody>
	
									@php 
										$total = 0;
									@endphp
	
									@foreach($products as $key => $product)
	
									@php
										$total += $product->quantity * $product->prices[count($product->prices) - 1]->price;
	
										// var_dump($product->price);
	
									@endphp
	
									<tr class="rem1" id="row{{$product->id}}">
										<td class="invert">{{ $key + 1 }}</td>
										<td class="invert-image">
											<a href="{{ route('products.show', ['product' => $product->id]) }}">
												<img src="{{ asset("assets/images/$product->name/" . $product->image)}}" alt="Product {{ $product->name }}" class="img-responsive" />
											</a>
										</td>
	
										<td>
											<input type="number" class="form-control quantity" data-productid="{{ $product->id }}" value="{{ $product->quantity }}" />
										</td>
	
										<td class="invert">{{ $product->name }} </td>
	
										<td class="invert">$<span id="priceProduct{{ $product->id}}">{{ $product->prices[count($product->prices) - 1]->price }}</span></td>
										<td class="invert">
											<div class="rem">
												<div class="close-icon removeProductFromCart" data-productid="{{ $product->id }}"> </div>
											</div>
	
										</td>
									</tr>
									
									@endforeach							
	
								</tbody>
							</table>
	
							<div class="my-4">
								<p id="priceParent">Total: $<span id="totalPrice">{{ $total }}</span></p>
	
							</div>
	
	
						</div>
	
						<div class="checkout-left row" id="order_form">
							
							<div class="offset-md-3 col-md-6 address_form">
								<h4>Add order details</h4>
	
								<form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
	
												<input type="hidden" id="user_id" value="{{ session()->get('user')->id }}" />
	
												<div class="controls">
													<label class="control-label">Full name: </label>
													<input class="billing-address-name form-control" type="text" id="name" name="name" placeholder="Full name" value="{{ session()->get('user')->first_name . ' ' . session()->get('user')->last_name }}" />
	
													<small id="nameError" class="form-text text-danger order-error">We'll never share your email with anyone else.</small>
	
												</div>
												<div class="card_number_grids">
													<div class="card_number_grid_left">
														<div class="controls">
															<label class="control-label">Mobile number:</label>
															<small id="phoneHelp" class="form-text text-muted mt-2 mb-2">Example: +3816412345678 </small>
															<input class="form-control" type="text" placeholder="Mobile number" id="phone" />
	
															<small id="phoneError" class="form-text text-danger order-error">We'll never share your email with anyone else.</small>
	
														</div>
													</div>
													<div class="card_number_grid_right">
														<div class="controls">
															<label class="control-label">Country: </label>
															<input class="form-control" type="text" id="country" placeholder="Country" />
	
															<small id="countryError" class="form-text text-danger order-error">We'll never share your email with anyone else.</small>
	
														</div>
													</div>
													<div class="clear"> </div>
												</div>
	
	
												<div class="controls">
													<label class="control-label">City: </label>
													<input class="form-control" id="city" type="text" placeholder="City" />
	
													<small id="cityError" class="form-text text-danger order-error">We'll never share your email with anyone else.</small>
	
												</div>
	
												<div class="controls">
													<label class="control-label">Address: </label>
													<input class="form-control" type="text" placeholder="Address" id="address" />
	
													<small id="addressError" class="form-text text-danger order-error">We'll never share your email with anyone else.</small>
	
												</div>
	
												<div class="controls">
													<label class="control-label">Card number:</label>
													<input class="form-control" type="text" placeholder="Card number" id="card_number" />
	
													<small id="card_numberError" class="form-text text-danger order-error">We'll never share your email with anyone else.</small>
												</div>
	
												<div class="controls">
													<label class="control-label">CVV:</label>
													<input class="form-control" type="text" placeholder="CVV" id="cvv" />
	
													<small id="cvvError" class="form-text text-danger order-error">We'll never share your email with anyone else.</small>
												</div>
	
											</div>
											<button type="button" class="submit check_out" id="submitOrder">Submit</button>
										</div>
									</section>
								</form>
								{{-- <div class="checkout-right-basket">
									<a href="payment.html">Make a Payment </a>
								</div> --}}
							</div>
	
							<div class="clearfix"> </div>
	
						</div>

						
					@else 
						<h4 id="no-elements">Your cart is empty</h4>
					@endif
					
				</div>

			</div>

		</div>
	</section>


@endsection

@section('pageScripts')

	<script src="{{ asset('assets/js/orders.js') }}"></script>

	<!--quantity-->
	<script>
		$('.value-plus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
	</script>
	<!--quantity-->
	<!--close-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close2').on('click', function (c) {
				$('.rem2').fadeOut('slow', function (c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close3').on('click', function (c) {
				$('.rem3').fadeOut('slow', function (c) {
					$('.rem3').remove();
				});
			});
		});
	</script>
	<!--//close-->

@endsection