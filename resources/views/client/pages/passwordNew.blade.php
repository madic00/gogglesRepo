@extends('client.layout')

@section('title') Goggles | Password Reset @endsection

@section('keywords') goggles, reset password, password recovery goggles, log in optic store, sunglasses, eyeglasses, goggles eyeglasses @endsection
@section('description') Login to use our full fuctionalities. @endsection

@section('banner')

    @include('client.components.banner', ['bannerTitle' => "Password Reset"])

@endsection

@section('content')

    <section class="banner-bottom-wthreelayouts py-lg-5 py-3">
        <div class="container">
            <h3 class="tittle-w3layouts text-center my-lg-4 my-4">Password Reset</h3>

            <div class="inner_sec">
            
                <div class="contact_grid_right">

                        <div class="alert" role="alert" id="passwordResponse">
                        </div>

                    <form action="{{ route('password.update') }}" method="post">

                        @csrf

                        <div class="row contact_left_grid">
                            <div class="col-md-6 con-left mx-auto">

                                @php 
                                    $token = request()->get('validator');
                                @endphp

                                <input type="hidden" id="validatorToken" name="validatorToken" value="{{ $token }}" />

                                <div class="form-group">
                                    <label class="my-2" for="password">Enter new Password</label>
                                    <input class="form-control @error('password') border border-danger @enderror" type="password" name="password" id="password" placeholder="" />

                                    <small id="passwordError" class="form-text text-danger"></small>

                                </div>

                                <div class="form-group">
                                    <label class="my-2" for="password_confirmation">Re-type new password</label>
                                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="" />
                                </div>

    
                                <div class="form-group mt-3">
                                    <input class="form-control" type="submit" value="Submit" id="submitNewPassword" />
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