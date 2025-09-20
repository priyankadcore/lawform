<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                   <h4 class="mt-3 font-size-16 text-white"> Admin dashboard</h4>
                </div>
                
            </div>
        </div>



        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>


                {{-- Sliders --}}
                {{-- <li>
                    <a href="{{ route('admin.sliders.index') }}" class="waves-effect">
                        <i class="fas fa-sliders-h"></i>
                        <span>Home Sliders</span>
                    </a>
                </li> --}}

                {{-- Property --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-home"></i>
                        <span>Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.property_types.index') }}">Property Type</a></li>
                        <li><a href="{{ route('admin.property_statuses.index') }}">Property Status</a></li>
                        <li><a href="{{ route('admin.properties.index') }}">Properties</a></li>
                    </ul>
                </li>

               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
