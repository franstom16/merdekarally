<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Global stylesheets -->
        <link href="{{ asset('css/googleapis-roboto.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('plugins/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('plugins/bootstrap/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/dist/layout.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/dist/components.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/dist/colors.min.css') }}" rel="stylesheet" type="text/css">
        <style>
            .sidebar-user-material .sidebar-user-material-body{background:url("{{ asset('img/user_bg3.jpg') }}") center center no-repeat;background-size:cover}
        </style>
	<!-- /global stylesheets -->
    </head>
    <body>
        <!-- Main navbar -->
	    <div class="navbar navbar-expand-md navbar-dark bg-danger px-0">
            <div class="container">
                <div class="navbar-brand wmin-200">
                    <a href="{{ url('dashboard') }}" class="d-inline-block">
                        <img src="{{ asset('img/logo.png') }}" alt="">
                    </a>
			    </div>
			</div>

			<div class="d-md-none">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
					<i class="icon-tree5"></i>
				</button>
			</div>

        </div>
	    <!-- /main navbar -->
        <!-- Page header -->
        <div class="page-header">
            <div class="breadcrumb-line breadcrumb-line-light px-0">
                <div class="container header-elements-md-inline">
                    <div class="d-flex">
                        <div class="breadcrumb">
                            <a href="{{ url('dashboard') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i></a>
                            <span class="breadcrumb-item active">Dashboard</span>
                        </div>
                        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <!-- Page content -->
        <div class="page-content container pt-0">
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">
                    @yield('content')
                </div>
                <!-- /content area -->
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar-footer">
                <div class="navbar-collapse collapse" id="navbar-footer">
                    <span class="navbar-text">
                        Copyright &copy; {{ date('Y') }} Advrally
                    </span>
                </div>
            </div>
        </div>
        <!-- /footer -->
        <script src="{{ asset('plugins/main/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('plugins/loaders/blockui.min.js') }}"></script>
        <script src="{{ asset('plugins/forms/selects/select2.min.js') }}"></script>
        <script src="{{ asset('plugins/tables/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/datatable.js') }}"></script>
        <script src="{{ asset('ctrl/dashboard.js') }}"></script>
    </body>
</html>
