@extends('client.layout')

@section('title') Goggles | Contact @endsection

@section('keywords') goggles, contact, contact goggles, contact optic store, sunglasses, eyeglasses, goggles eyeglasses @endsection
@section('description') Have any questions? Feel free to send message or call. @endsection

@section('banner')

    @include('client.components.banner', ['bannerTitle' => "Contact"])

@endsection

@section('content')

    <section class="banner-bottom-wthreelayouts py-lg-5 py-3">
        <div class="container">
            <h3 class="tittle-w3layouts text-center my-lg-4 my-4">Contact</h3>
            <div class="inner_sec">
                <p class="sub text-center mb-lg-5 mb-3">We love to discuss your idea</p>
                <div class="address row">

                    <div class="col-lg-4 address-grid">
                        <div class="row address-info">
                            <div class="col-md-3 address-left text-center">
                                <i class="far fa-map"></i>
                            </div>
                            <div class="col-md-9 address-right text-left">
                                <h6>Address</h6>
                                <p> California, USA

                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4 address-grid">
                        <div class="row address-info">
                            <div class="col-md-3 address-left text-center">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="col-md-9 address-right text-left">
                                <h6>Email</h6>
                                <p>Email :
                                    <a href="mailto:example@email.com"> info@goggles.com</a>

                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 address-grid">
                        <div class="row address-info">
                            <div class="col-md-3 address-left text-center">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <div class="col-md-9 address-right text-left">
                                <h6>Phone</h6>
                                <p>+1 234 567 8901</p>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="contact_grid_right">
                    <form action="#" method="post">
                        @csrf

                        <div class="alert" role="alert" id="emailStatus">
                        </div>

                        <div class="row contact_left_grid">
                            <div class="col-md-6 con-left">

                                <div class="form-group">
                                    <label class="my-2">Name</label>
                                    <input class="form-control" type="text" name="Name" id="name" placeholder="">

                                    <small id="nameError" class="form-text text-danger contact-error"></small>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="Email" id="email" placeholder="">

                                    <small id="emailError" class="form-text text-danger contact-error"></small>
                                </div>
                                <div class="form-group">
                                    <label class="my-2">Subject</label>
                                    <input class="form-control" type="text" name="Subject" id="subject" placeholder="">

                                    <small id="subjectError" class="form-text text-danger contact-error"></small>
                                </div>
                            </div>
                            <div class="col-md-6 con-right">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea id="message" placeholder=""></textarea>

                                    <small id="messageError" class="form-text text-danger contact-error"></small>
                                </div>
                                <input class="form-control" type="submit" value="Submit" id="submitContact" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <div class="contact-map">

		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100949.24429313939!2d-122.44206553967531!3d37.75102885910819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1472190196783"
		    class="map" style="border:0" allowfullscreen=""></iframe>
	</div>

@endsection

@section('pageScripts')
    <script src="{{ asset('assets/js/contact.js') }}"></script>
@endsection