<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.fixed.head')
	
</head>

<body id="page-top">
    
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('admin.fixed.sidebar')
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('admin.fixed.topbar')

                @yield('content')
        
                @include('admin.fixed.footer')
                
            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->    

	@include('admin.fixed.scripts')

    @yield('pageScripts')

</body>

</html>