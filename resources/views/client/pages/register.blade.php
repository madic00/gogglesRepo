@extends('client.layout')

@section('title') Goggles | Register @endsection

@section('keywords') goggles, register, register goggles, optic store, sunglasses, eyeglasses, goggles eyeglasses @endsection
@section('description') Register your account to get the exlusive offers @endsection

@section('banner')

    @include('client.components.banner', ['bannerTitle' => "Register"])

@endsection

@section('content')

    <section class="banner-bottom-wthreelayouts py-lg-5 py-3">
        <div class="container">
            <h3 class="tittle-w3layouts text-center my-lg-4 my-4">Register your account</h3>
            <div class="inner_sec">
            
                <div class="contact_grid_right">

                    @if(session('registerStatus'))

                        <div class="alert alert-danger" role="alert">
                            {{ session('registerStatus') }}
                        </div>

                    @endif

                    @if(session('registerSuccess'))

                        <div class="alert alert-success" role="alert">
                            {{ session('registerSuccess') }}
                        </div>

                    @endif



                    <form action="{{ route('register') }}" method="post">

                        @csrf

                        <div class="row contact_left_grid">
                            <div class="col-md-6 con-left">
                                <div class="form-group">
                                    <label class="my-2" for="first_name">First Name</label>
                                    <input class="form-control @error('first_name') border border-danger @enderror" type="text" name="first_name" id="first_name" placeholder="" value="{{ old('first_name') }}" />

                                    @error('first_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label class="my-2" for="last_name">Last Name</label>
                                    <input class="form-control @error('last_name') border border-danger @enderror" type="text" name="last_name" id="last_name" placeholder="" value="{{ old('last_name') }}" />

                                    @error('last_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control @error('email') border border-danger @enderror" type="email" name="email" placeholder="" value="{{ old('email') }}" /> 

                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6 con-right">
                                <div class="form-group">
                                    <label class="my-2" for="password">Password</label>
                                    <input class="form-control @error('password') border border-danger @enderror" type="password" name="password" id="password" placeholder="" />

                                    @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    <label class="my-2" for="password_confirmation">Re-type password</label>
                                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="" />
                                </div>

                                <div class="form-group mt-3">
                                    <input class="form-control" type="submit" value="Submit" />
                                </div>

                                

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection