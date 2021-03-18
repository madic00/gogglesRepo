@extends('client.layout')

@section('title') Goggles | Password Recovery @endsection

@section('keywords') goggles, password reset, recovery goggles, optic store, sunglasses, eyeglasses, goggles eyeglasses @endsection
@section('description') Reset password for your accoutn @endsection

@section('banner')

    @include('client.components.banner', ['bannerTitle' => "Password Recovery"])

@endsection

@section('content')

    <section class="banner-bottom-wthreelayouts py-lg-5 py-3">
        <div class="container">
            <h3 class="tittle-w3layouts text-center my-lg-4 my-4">Password Recovery</h3>

            <div class="inner_sec">
            
                <div class="contact_grid_right">

                    <div class="alert" role="alert" id="emailResponse">
                    </div>

                    <form action="{{ route('password.post') }}" method="post">

                        @csrf

                        <div class="row contact_left_grid">
                            <div class="col-md-6 con-left mx-auto">

                                <div class="form-group">
                                    <label>An e-mail will be send to you with instructions on how to reset password</label>
                                    <input class="form-control @error('email') border border-danger @enderror" type="email" name="email" id="email" placeholder="Email..." value="{{ old('email') }}" /> 

                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <small id="emailError" class="form-text text-danger passwordResetError">blake@gmail.com</small>
    
                                <div class="form-group mt-3">
                                    <input class="form-control" name="btnReset" type="submit" id="btnReset" value="Submit" />
                                </div>

                            </div>
                       
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>

@endsection

@section('pageScripts')
    <script src="{{ asset('assets/js/password.js') }}"></script>
@endsection