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
            .page-header { 
                background-image: url("{{ asset('img/banner.jpg') }}");
                background-repeat: no-repeat;
                background-size: 100% 100%;
                height: 100px;
            }
        </style>
	<!-- /global stylesheets -->
    </head>
    <body class="navbar-md-md-top">
        <div class="fixed-top">
            <!-- Page header -->
            <div class="page-header page-header-dark">
                <!-- Main navbar -->
                <div class="navbar navbar-expand-md border-transparent">
                    <div class="d-md-none">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                            <i class="icon-tree5"></i>
                        </button>
                    </div>
                </div>
                <!-- /main navbar -->


                <!-- Page header content -->
                <div class="page-header-content header-elements-md-inline">
                    
                </div>
                <!-- /page header content -->

            </div>
            <!-- /page header -->
        </div>
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
        <script>
            var main_url = "{{ env('APP_URL') }}";
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/datatable.js') }}"></script>
        <script src="{{ asset('ctrl/dashboard.js') }}"></script>
    </body>
</html>
