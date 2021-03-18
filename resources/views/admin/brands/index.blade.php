@extends('admin.layout')

@section('title') Brands @endsection

@section('content') 

     <!-- Main Content -->
     <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid my-5">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Brands</h1>
            </div>

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

            <div class="my-4">
                <a href="{{ route('brands.create') }}" class="btn btn-primary">Add new Brand</a>

            </div>

            <div class="row">

                <div class="col-md-12">
                    
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Active</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="table_brands">
                            @foreach($brands as $key => $brand)

                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $brand->brand_name }}</td>
                                <td>
                                    @if($brand->brand_active == 1)
                                        Yes
                                    @else 
                                        No
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('brands.edit', ['brand' => $brand->id]) }}" ><i class="fas fa-fw fa-edit fa-lg"></i></a>
                                </td>
                                <td>

                                    <form action="{{ route('brands.destroy', ['brand' => $brand->id]) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method("DELETE")

                                        <button type="submit" /><i class="fas fa-fw fa-trash fa-lg"></i></button>

                                    </form>

                                </td>
                            </tr>

                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Active</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>
                      </table>
                      
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

@endsection

@section('pageScripts')

    <!-- Page level plugins -->
    <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/admin/js/demo/datatables-demo.js')}}"></script>

    <script src="{{ asset('assets/admin/js/brands.js') }}"></script>
@endsection