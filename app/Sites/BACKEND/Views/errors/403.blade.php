@extends('layout')
@section('active-menu')
    @include('active-menu')
@endsection

@section('content')
    <body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <!-- page content -->
            <div class="col-md-12">
                <div class="col-middle">
                    <div class="text-center text-center">
                        <h1 class="error-number">403</h1>
                        <h2>Access denied</h2>
                        <p>You do not have permission to access this resource.
                        </p>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>

@endsection