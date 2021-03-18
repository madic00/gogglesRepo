@extends('client.layout')

@section('title') Goggles | Author @endsection

@section('keywords') goggles, author, author of goggles, contact optic store, sunglasses, eyeglasses, goggles eyeglasses @endsection
@section('description') Find more information about author of website. @endsection

@section('banner')

    @include('client.components.banner', ['bannerTitle' => "Author"])

@endsection

@section('content')

    <section class="banner-bottom-wthreelayouts py-lg-5 py-3">
        <div class="container">
            <h3 class="tittle-w3layouts text-center my-lg-4 my-4">Author</h3>
            <div class="row">
                
                <div class="col-md-12 mx-auto text-center my-5">
                    <h2>Aleksandar Madić 2/18</h2>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="{{ asset('assets/images/author.jpg') }}" alt="Author picture" />
                </div>
                <div class="col-md-6">
                    <p> I am currently a student at the ICT College. I was born in Bor, where I finished elementary and high school. In high school, I first encountered web design and a little bit of programming and I liked it. It made me choose this college. In my spare time, I like to play basketball, go to the theater, travel and explore new things.</p>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('pageScripts')
    <script src="{{ asset('assets/js/contact.js') }}"></script>
@endsection