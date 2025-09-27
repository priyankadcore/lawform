@extends('admin.layouts.master')
@section('title')
    Dashboard
@endsection
@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
 <style>
    
        .dashboard-card {
            border-radius: 10px;
            border: none;
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 20px;
            color: white;
        }
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        .card-icon {
            font-size: 2.5rem;
            opacity: 0.8;
        }
        .card-value {
            font-size: 2rem;
            font-weight: bold;
            margin: 10px 0;
        }
        .card-title {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 0;
        }
        .card-1 { background: linear-gradient(45deg, #c0e1f7ff, #547699ff); }
        .card-2 { background: linear-gradient(45deg, #f3d4b0ff, #f7ae85ff); }
        .card-3 { background: linear-gradient(45deg, #eaf0f1ff, #c0bcbbff); }
        .card-4 { background: linear-gradient(45deg, #d1ade6ff, #d5a6ebff); }
        .card-5 { background: linear-gradient(45deg, #9b59b6, #8e44ad); }
        .card-6 { background: linear-gradient(45deg, #1abc9c, #16a085); }
        .card-7 { background: linear-gradient(45deg, #34495e, #2c3e50); }
        .card-8 { background: linear-gradient(45deg, #f3ad6fff, #d35400); }
        
        .breadcrumb {
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 10px 15px;
        }
        .page-title {
            color: #2c3e50;
            font-weight: 600;
        }
    </style>
@endsection
@section('content')
    <x-breadcrub pagetitle="Admin" subtitle="Dashboard" title="Dashboard" />

    <div class="container-fluid">
       
            <div class="row">
              <!-- Total Pages Card -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card dashboard-card card-1">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="card-value">42</div>
                                    <div class="card-title">Total Pages</div>
                                </div>
                                <div class="card-icon">
                                    <i class="bi bi-files"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <small><i class="bi bi-arrow-up"></i> 5 new this month</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Active Services Card -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card dashboard-card card-2">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="card-value">18</div>
                                    <div class="card-title">Active Services</div>
                                </div>
                                <div class="card-icon">
                                    <i class="bi bi-gear"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <small><i class="bi bi-check-circle"></i> All systems operational</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Blogs Card -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card dashboard-card card-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="card-value">127</div>
                                    <div class="card-title">Blogs</div>
                                </div>
                                <div class="card-icon">
                                    <i class="bi bi-pencil-square"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <small><i class="bi bi-eye"></i> 2,543 views this week</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Total Users Card -->
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card dashboard-card card-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="card-value">1,248</div>
                                    <div class="card-title">Total Users</div>
                                </div>
                                <div class="card-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div>
                            <div class="mt-3">
                                <small><i class="bi bi-person-plus"></i> 24 new this week</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        
    </div>
@endsection
@section('scripts')
@endsection
