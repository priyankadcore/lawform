@extends('admin.layouts.master')
@section('title')
    Dashboard
@endsection
@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
@section('content')
    <x-breadcrub pagetitle="Morvin" subtitle="Dashboard" title="Dashboard" />

    <div class="container-fluid">
        <div class="page-content-wrapper">
            <div class="row">
                {{-- <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-4 float-sm-start">Quick Summary</h4>
                            <div class="float-sm-end">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Day</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Month</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Year</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="clearfix"></div>




                        </div>
                    </div>
                </div> --}}



            </div>


        </div>
    </div> <!-- container-fluid -->
@endsection
@section('scripts')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Plugins js-->
    <script src="{{ URL::asset('build/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}">
    </script>

    <script src="{{ URL::asset('build/js/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
