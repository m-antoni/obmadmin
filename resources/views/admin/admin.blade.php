@extends('layouts.app')

@section('admin-content')
<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row">
   {{--  <img src="/img/logo.jpeg" class="img-fluid" alt=""> --}}

{{--     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h1 class="pageheader-title" align="center"> </h1>
            <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">One Beem E-Commerce Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div> --}}
</div>

<div class="ecommerce-widget">
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Total Users</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1"><i class="fa fa-users"></i> {{ $users}}</h1>
                    </div>
                    {{-- <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                    </div> --}}
                </div>
                <div id="sparkline-revenue"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Products</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1"><i class="fa fa-boxes"></i> {{ $products }}</h1>
                    </div>
                  {{--   <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                        <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                    </div> --}}
                </div>
                <div id="sparkline-revenue2"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Pending</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">00</h1>
                    </div>
                    <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                        
                    </div>
                </div>
                <div id="sparkline-revenue3"></div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted">Total Orders</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1"><i class="fa fa-dolly"></i> {{ $orders }}</h1>
                    </div>
                    {{-- <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                        <span>-2.00%</span>
                    </div> --}}
                </div>
                <div id="sparkline-revenue4"></div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end pageheader  -->
<!-- ============================================================== -->
@endsection
