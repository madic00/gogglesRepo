@extends('admin.layout')

@section('title') Products @endsection

@section('content') 

     <!-- Main Content -->
     <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid my-5">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Products</h1>
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

            <div>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Add new Product</a>

            </div>

            <div class="my-5">
                <form class="form-inline">
                    <label for="keyword" class="mr-2">Keyword</label>
                    <input type="text" class="form-control mr-4" id="keyword" placeholder="Product name">

                    <label for="entities" class="mr-2">Number of entities</label>
                    <select name="entities" id="entities" class="form-control mr-4">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>

                    <label for="sort" class="mr-2">Choose sort: </label>
                    <select class="form-control mr-4" id="sort">
                        <option value="n_asc">Name: A-Z</option>
                        <option value="n_desc">Name: Z-A</option>
                        <option value="p_asc">Price: Low to High</option>
                        <option value="p_desc">Price: High to Low</option>
                    </select>
                  
                    <button type="button" class="btn btn-primary" id="submitFilters">Submit</button>
                  </form>
            </div>

            <div class="row">

                <div class="col-md-12">
                    
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Brand</th>
                                <th>Active</th>
                                <th>Gender</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id="table_products">
                            @foreach($products as $key => $product)

                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <img src="{{ asset("assets/images/$product->name/" . $product->image) }}" alt="Product {{ $product->name }}" class="img-fluid admin-img" />
                                </td>
                                <td>${{ $product->price}}</td>
                                <td>{{ $product->brand_name}}</td>
                                <td>
                                    @if($product->is_active == 1)
                                        Yes
                                    @else 
                                        No
                                    @endif
                                </td>
                                <td>
                                    @if($product->gender_id == 0)
                                        Female
                                    @else 
                                        Male
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('products.edit', ['product' => $product->id]) }}" ><i class="fas fa-fw fa-edit fa-lg"></i></a>
                                </td>
                                <td>

                                    <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" class="delete-form">
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
                                <td colspan="7">
                                    {{ $products->links('vendor.pagination.bootstrap-4') }}
                                </td>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Brand</th>
                                <th>Active</th>
                                <th>Gender</th>
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

    <script src="{{ asset('assets/admin/js/products.js') }}"></script>
@endsection