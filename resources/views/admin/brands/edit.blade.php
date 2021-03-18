@extends('admin.layout')

@section('title') Edit the Brand @endsection

@section('content') 

     <!-- Main Content -->
     <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid my-5">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Edit {{ $brand->name }} brand</h1>
            </div>

            <div class="row">
                <div class="col-md-6">

                    @if(session()->has('success'))
                        <div class="container mt-4">
                            <div class="alert alert-success" role="alert">
                                {{ session('success')}}
                            </div>
                        </div>
                    @endif

                    @if(session()->has('errorMessage'))
                        <div class="container mt-4">
                            <div class="alert alert-danger" role="alert">
                                {{ session('errorMessage')}}
                            </div>
                        </div>
                    @endif

                    @include('admin.brands.form', ['action' => 'brands.update'])

                </div>

            </div>



        </div>
        <!-- /.container-fluid -->

@endsection

@section('pageScripts')

    <script src="{{ asset('assets/admin/js/products.js') }}"></script>
        
@endsection
