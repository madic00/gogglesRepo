    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
            {{-- <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div> --}}
            <div class="sidebar-brand-text mx-3">Goggles</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        @php 
            $navItems = [
                ['Dashboard', 'admin.home'],
                ['Products', 'products.index'],
                ['Brands', 'brands.index'],
                ['Orders', 'orders.index'],
                ['User actions', 'useractions.index']
            ];
        @endphp

        @foreach($navItems as $item)
            <li class="nav-item @if(request()->routeIs($item[1])) active @endif">
                <a class="nav-link" href="{{ route($item[1])}}">
                    <span>{{ $item[0] }}</span>
                </a>
            </li>
        @endforeach

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


    </ul>
    <!-- End of Sidebar -->