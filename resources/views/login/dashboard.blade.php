@extends('layout.main')
@section('content')

<div class="page-content">
    <div class="container">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                    <a href="/admin/logout">Logout</a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- end row -->
        @endsection('content')
        @section('custom-scripts')

        <script type="text/javascript"></script>
        @endsection