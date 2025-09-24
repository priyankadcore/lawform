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

                   <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-bars"></i> <!-- Main menu icon -->
                        <span>Section</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li> <a href="{{ route('admin.section_template.index') }}">
                               All Section
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('admin.property_statuses.index') }}">
                                Footer Menu
                            </a>
                        </li> --}}
                    </ul>
                </li>

                {{-- Property --}}

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-home"></i>
                        <span>Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        {{-- <li><a href="{{ route('admin.property_types.index') }}">All Pages</a></li>/ --}}
                        <li><a href="{{ route('admin.property_statuses.index') }}">Add Pages</a></li>
                    </ul>
                </li>

               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
