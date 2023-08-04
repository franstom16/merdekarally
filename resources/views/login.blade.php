<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Login - {{ config('app.name', 'Laravel') }}</title>
        <!-- Global stylesheets -->
        <link href="{{ asset('css/googleapis-roboto.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('plugins/icons/icomoon/styles.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('plugins/bootstrap/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/dist/layout.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/dist/components.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/dist/colors.min.css') }}" rel="stylesheet" type="text/css">
        <!-- /global stylesheets -->
    </head>
    <body>

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content d-flex justify-content-center align-items-center">

                    <!-- Login form -->
                    <form id="form-login" class="login-form" method="post" action="{{ url('login') }}">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                    <h5 class="mb-0">Login to your account</h5>
                                    <span class="d-block text-muted">Enter your credentials below</span>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group form-group-feedback form-group-feedback-left">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" id="btn-submit" class="btn btn-primary btn-block">
                                        <span class="spinner-border spinner-border-sm mr-1" style="display:none" role="status" aria-hidden="true"></span>
                                        Sign in <i class="icon-circle-right2 ml-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- /login form -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->
        <!-- Core JS files -->
        <script src="{{ asset('plugins/main/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('plugins/loaders/blockui.min.js') }}"></script>
        <script src="{{ asset('plugins/forms/validation/validate.min.js') }}"></script>
        <script src="{{ asset('plugins/notifications/noty.min.js') }}"></script>
        <!-- /core JS files -->
        <script>var main_url = "{{ env('APP_URL') }}";</script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('ctrl/auth/login.js') }}"></script>
    </body>
</html>
