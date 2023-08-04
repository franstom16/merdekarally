<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravele') }}</title>
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
        <div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">

            <!-- Header with logos -->
            <div class="navbar-header navbar-dark bg-indigo d-none d-md-flex align-items-md-center">
                <div class="navbar-brand navbar-brand-md">
                    <a href="{{ url('/') }}" class="d-inline-block">
                        <img src="{{ asset('img/logo_light.png') }}" alt="">
                    </a>
                </div>
                
                <div class="navbar-brand navbar-brand-xs">
                    <a href="{{ url('/') }}" class="d-inline-block">
                        <img src="{{ asset('img/logo_icon_light.png') }}" alt="">
                    </a>
                </div>
            </div>
            <!-- /header with logos -->


            <!-- Mobile controls -->
            <div class="d-flex flex-1 d-md-none">
                <div class="navbar-brand mr-auto">
                    <a href="index.html" class="d-inline-block">
                        <img src="{{ asset('img/logo_dark.png') }}" alt="">
                    </a>
                </div>	

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                    <i class="icon-tree5"></i>
                </button>

                <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                    <i class="icon-paragraph-justify3"></i>
                </button>
            </div>
            <!-- /mobile controls -->


            <!-- Navbar content -->
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="navbar-nav mr-md-auto">
                    <li class="nav-item">
                        <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                            <i class="icon-paragraph-justify3"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="navbar-nav-link">
                            <i class="icon-switch2"></i>
                            <span class="d-md-none ml-2">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /navbar content -->
        </div>
        <!-- /main navbar -->

                        
        <!-- Page content -->
        <div class="page-content">
            <!-- Main sidebar -->
            <div class="sidebar sidebar-light sidebar-main sidebar-expand-md">
                <!-- Sidebar mobile toggler -->
                <div class="sidebar-mobile-toggler text-center">
                    <a href="#" class="sidebar-mobile-main-toggle">
                        <i class="icon-arrow-left8"></i>
                    </a>
                    Navigation
                    <a href="#" class="sidebar-mobile-expand">
                        <i class="icon-screen-full"></i>
                        <i class="icon-screen-normal"></i>
                    </a>
                </div>
                <!-- /sidebar mobile toggler -->
                <!-- Sidebar content -->
                <div class="sidebar-content">                    
                    <!-- User menu -->
                    <div class="sidebar-user-material">
                        <div class="sidebar-user-material-body">
                            <div class="card-body text-center">
                                <a href="#">
                                    <img src="{{ asset('img/avatar.png') }}" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
                                </a>
                                <h6 class="mb-0 text-white text-shadow-dark">Victoria Baker</h6>
                            </div>
                                                        
                            <div class="sidebar-user-material-footer">
                                <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark"><span></span></a>
                            </div>
                        </div>
                    </div>
                    <!-- /user menu -->                    
                    <!-- Main navigation -->
                    <div class="card card-sidebar-mobile">
                        <ul class="nav nav-sidebar" data-nav-type="accordion">
                            {!! app_menu($page_act) !!}                                
                        </ul>
                    </div>
                    <!-- /main navigation -->
                </div>
                <!-- /sidebar content -->
            </div>
            <!-- /main sidebar -->
            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Page header -->
                <div class="page-header page-header-light">
                    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                        <div class="d-flex">
                            <div class="breadcrumb">
                                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                                @if (trim($__env->yieldContent('breadcrumb')))
                                    @yield('breadcrumb')
                                @endif
                            </div>
                            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /page header -->
                <!-- Content area -->
                <div class="content pt-0">
                    @yield('content')
                </div>
                <!-- /content area -->
                <!-- Footer -->
                <div class="navbar navbar-expand-lg navbar-light">
                    <div class="text-center d-lg-none w-100">
                        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                            <i class="icon-unfold mr-2"></i>
                            Footer
                        </button>
                    </div>

                    <div class="navbar-collapse collapse" id="navbar-footer">
                        <span class="navbar-text">
                            Copyright &copy; {{ date('Y') }} Advrally
                        </span>
                    </div>
                </div>
                <!-- /footer -->
            </div>
            <!-- /main content -->
        </div>
        <!-- /page content -->
        <!-- Default Modal -->
        @yield('modals')
        <!-- /default modal -->
        <!-- Core JS files -->
        <script src="{{ asset('plugins/main/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('plugins/loaders/blockui.min.js') }}"></script>
        <script src="{{ asset('plugins/ui/ripple.min.js') }}"></script>
        @yield('plugin_js')
        <!-- /core JS files -->
        <!-- Theme JS files -->
        <script>
            var main_url = "{{ env('APP_URL') }}";
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            function blockUI(blockDiv, msg) {
                msg = msg !== undefined && msg.length > 0 ? msg : 'Please wait';
                var dataBlock = {
                    message: '<i class="icon-spinner4 spinner"></i><div>'+ msg +'... </div>',
                    overlayCSS: {
                        backgroundColor: '#fff',
                        opacity: 0.8,
                        cursor: 'wait'
                    },
                    css: {
                        border: 0,
                        padding: 0,
                        backgroundColor: 'transparent'
                    }
                };

                if (blockDiv !== undefined && blockDiv.length > 0) {
                    $(blockDiv).block(dataBlock);
                } else {
                    $.blockUI(dataBlock);
                }
            }
        </script>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('script_js')
        <!-- /theme JS files -->
    </body>
</html>
