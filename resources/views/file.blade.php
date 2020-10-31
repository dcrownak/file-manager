@extends('admin.layouts.master')
@section('page_title','Basic Control')
@push('extra_styles')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/vendor/file-manager/css/file-manager.css') }}">
    <style>
        html, body {height: 100%;margin: 0;}
        .full-height {height: 100%;}
    </style>
@endpush
@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- Basic Control -->
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">File Manger</h6>
                    </div>
                    <div class="card-body">
                        <div class="full-height">
                            <div id="fm"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---Container Fluid-->
@endsection
@push('extra_scripts')
    <script src="{{ asset('/vendor/file-manager/js/file-manager.js') }}"></script>
@endpush
@section('scripts')
    @include('admin.layouts.flash-message')
@endsection

