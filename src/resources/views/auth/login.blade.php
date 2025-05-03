<!DOCTYPE html>
<!-- =========================================================

==============================================================
* PHP Version : 8.1
* Laravel Version : 10 (https://laravel.com)
* License: You must have a valid license purchased in order to legally use the theme for your project.


========================================================= -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{asset('/')}}app-assets/" data-template="vertical-menu-template">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta name="description" content="MD. Mahadi Hasan Shakil" />
        <meta name="keywords" content="MD. Mahadi Hasan Shakil" />
        <meta name="author" content="MD. Mahadi Hasan Shakil" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Login</title>

        <meta name="description" content="" />

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{asset('/')}}image/favicon.png" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />


          @if (app()->getLocale() == 'bn')
          <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">

          {{-- <link rel="stylesheet" href="{{ asset('fonts/Nikosh.ttf') }}">
          <link rel="stylesheet" href="{{ asset('fonts/NikoshBAN.ttf') }}"> --}}
          {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap"> --}}
          @else
          <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
          @endif

        <!-- Icons -->
        <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/fonts/fontawesome.css" />
        <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/fonts/tabler-icons.css" />
        <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/fonts/flag-icons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{asset('/')}}app-assets/css/demo.css" />

        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/node-waves/node-waves.css" />
        <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/typeahead-js/typeahead.css" />
        <!-- Vendor -->
        <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/libs/@form-validation/form-validation.css" />

        <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="{{asset('/')}}app-assets/vendor/css/pages/page-auth.css" />

        <!-- Helpers -->
        <script src="{{asset('/')}}app-assets/vendor/js/helpers.js"></script>
        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
        <script src="{{asset('/')}}app-assets/vendor/js/template-customizer.js"></script>
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{asset('/')}}app-assets/js/config.js"></script>

        {{-- <style>
            body {
                font-family: 'Nikosh', sans-serif;
            }
        </style> --}}
    </head>

    <body>
        <!-- Content -->
        <div class="authentication-wrapper authentication-cover authentication-bg">
            <div class="authentication-inner row">
                <div class="d-none d-lg-flex col-lg-7 p-0 login-background">
                    <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">

                    </div>
                </div>
                <!-- /Left Text -->

                <!-- Login -->
                <div class="d-flex col-12 col-lg-5 align-items-center p-sm-5 p-4">
                    <div class="w-px-500 mx-auto">
                       {{-- <h3 class="mb-1">{{ __('login.title') }}</h3>
                        <p class="mb-4">{{ __('login.subtitle') }}</p>--}}
                        <h3 class="mb-1">Login</h3>
                        @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                        @endif
                        <form action="{{route('login.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="user-name" class="form-label">User Name or Email</label>
                                <input type="text" class="form-control" name="contact" id="user-name" placeholder="User Name or Email" />
                                @error('email')
                                <span class="text text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror @error('phone')
                                <span class="text text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror @error('contact')
                                <span class="text text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="user-password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password" class="form-control" id="user-password" placeholder="Password" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                                @error('password')
                                <span class="text text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" id="remember-me" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary d-grid w-100">Login</button>
                        </form>

                    </div>
                </div>
                <!-- /Login -->
            </div>
        </div>
        <script src="{{asset('/')}}app-assets/vendor/libs/jquery/jquery.js"></script>
        <script src="{{asset('/')}}app-assets/vendor/libs/popper/popper.js"></script>
        <script src="{{asset('/')}}app-assets/vendor/js/bootstrap.js"></script>
        <script src="{{asset('/')}}app-assets/vendor/libs/node-waves/node-waves.js"></script>
        <script src="{{asset('/')}}app-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="{{asset('/')}}app-assets/vendor/libs/hammer/hammer.js"></script>
        <script src="{{asset('/')}}app-assets/vendor/libs/i18n/i18n.js"></script>
        <script src="{{asset('/')}}app-assets/vendor/libs/typeahead-js/typeahead.js"></script>
        <script src="{{asset('/')}}app-assets/vendor/js/menu.js"></script>

        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="{{asset('/')}}app-assets/vendor/libs/@form-validation/popular.js"></script>
        <script src="{{asset('/')}}app-assets/vendor/libs/@form-validation/bootstrap5.js"></script>
        <script src="{{asset('/')}}app-assets/vendor/libs/@form-validation/auto-focus.js"></script>

        <!-- Main JS -->
        <script src="{{asset('/')}}app-assets/js/main.js"></script>

        <!-- Page JS -->
        <script src="{{asset('/')}}app-assets/js/pages-auth.js"></script>
    </body>
</html>
