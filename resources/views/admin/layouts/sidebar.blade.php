<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div class="user-sidebar text-center">
            <div class="dropdown">
                <div class="user-img">
                    <h4 class="mt-3 font-size-16 text-white"> Admin Dashboard</h4>
                </div>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-home"></i>
                        <span>Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.pages-list.list') }}">All Pages</a></li>
                        <li><a href="{{ route('admin.pages.index') }}">Add Pages</a></li>
                    </ul>
                </li>

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
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.uploads.index') }}" >
                        <i class="fas fa-upload"></i>
                        <span>Uploads</span>
                    </a>
                </li>

               <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-th-large"></i>
                        <span>Menu</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.navbar.index') }}">
                                <span>Navigation</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.footer.index') }}">   
                                <span>Footer</span>
                            </a>
                        </li>
                    </ul>
                </li>

               <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-blog"></i>
                        <span>Blogs</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.categories.index') }}">
                                <span>Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.blogs.index') }}">
                                <span>Blog Posts</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.comments.index') }}">  
                                <span>Comments</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                <a href="{{ route('admin.team.index') }}">
                    <i class="fas fa-users"></i>
                    <span>Our Team</span>
                </a>
            </li>



                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
