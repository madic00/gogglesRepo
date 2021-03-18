@extends('admin.layout')

@section('title') Orders @endsection

@section('content') 

     <!-- Main Content -->
     <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid my-5">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Orders</h1>
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

            <div class="row">

                <div class="col-md-12">
                    
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User name</th>
                                <th>Address</th>
                                <th>Paid</th>
                                <th>Total price</th>
                            </tr>
                        </thead>
                        <tbody id="table_actions">
                           @foreach($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>
                                        @if($order->is_paid == 1)
                                            True
                                        @else
                                            False
                                        @endif
                                    </td>
                                    <td>${{ $order->total_price }}</td>
                                </tr>
                           @endforeach  
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>User name</th>
                                <th>Address</th>
                                <th>Paid</th>
                                <th>Total price</th>
                            </tr>
                        </tfoot>
                      </table>
                      
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

@endsection

@section('pageScripts')

    <script src="{{ asset('assets/admin/js/actions.js') }}"></script>

@endsection