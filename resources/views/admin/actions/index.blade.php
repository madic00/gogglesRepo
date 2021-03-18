@extends('admin.layout')

@section('title') User Actions @endsection

@section('content') 

     <!-- Main Content -->
     <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid my-5">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Users actions</h1>
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

            <div class="my-5">
                <form class="form-inline">
                    <label for="created_at" class="mr-2">Select date</label>
                    <input type="date" class="form-control mr-4" id="created_at" name="created_at">

                    <label for="select_all" class="mr-2">Select All</label>
                    <input type="checkbox" class="form-control mr-4" name="select_all" id="select_all" value="10" />
                  
                    <button type="button" class="btn btn-primary" id="submitDate">Submit</button>
                  </form>
            </div>


            <div class="row">

                <div class="col-md-12">
                    
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>User</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="table_actions">
                           @foreach($actions as $key => $action)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $action->action }}</td>
                                    <td>{{ $action->user->first_name . ' ' . $action->user->last_name }}</td>
                                    <td>{{ $action->created_at }}</td>
                                </tr>
                           @endforeach  
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>User</th>
                                <th>Date</th>
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