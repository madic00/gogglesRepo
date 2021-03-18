@extends('client.layout')

@section('title') Goggles | Log in @endsection

@section('keywords') goggles, log in goggles, log in optic store, sunglasses, eyeglasses, goggles eyeglasses @endsection
@section('description') Login to use our full fuctionalities. @endsection

@section('banner')

    @include('client.components.banner', ['bannerTitle' => "Login"])

@endsection

@section('content')

    <section class="banner-bottom-wthreelayouts py-lg-5 py-3">
        <div class="container">
            <h3 class="tittle-w3layouts text-center my-lg-4 my-4">Log in</h3>

            <div class="inner_sec">
            
                <div class="contact_grid_right">

                    @if(session('loginFail'))

                        <div class="alert alert-danger" role="alert">
                            {{ session('loginFail') }}
                        </div>

                    @endif

                    <form action="{{ route('login') }}" method="post">

                        @csrf

                        <div class="row contact_left_grid">
                            <div class="col-md-6 con-left mx-auto">

                                {{-- {{ dd($fromCart) }} --}}


                                @isset($fromCart)
                                    <input type="hidden" name="fromCart" value='true' />
                                @endisset

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control @error('email') border border-danger @enderror" type="email" name="email" placeholder="" value="{{ old('email') }}" /> 

                                    @error('email')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="my-2" for="password">Password</label>
                                    <input class="form-control @error('password') border border-danger @enderror" type="password" name="password" id="password" placeholder="" />

                                    @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <div class="form-group mt-3">
                                    <a href="{{ route('password.get') }}">Forgot your password?</a>

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