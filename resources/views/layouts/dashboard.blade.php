<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>
        {{-- <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}" type="image/x-icon" /> --}}
        <link rel="icon" type="image/png" href="{{ asset('/zubis/img/logo/z-logo-only.png') }}"/>
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('/ad-lte/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('/ad-lte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/ad-lte/plugins/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/ad-lte/plugins/summernote/summernote-bs4.css') }}">

        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('/ad-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/ad-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('/ad-lte/dist/css/adminlte.min.css') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

         <!-- Ekko Lightbox -->
        <link rel="stylesheet" href="{{ asset('/ad-lte/plugins/ekko-lightbox/ekko-lightbox.css') }}">

        <style>
            td img{
                width: 73px !important;
                height: 50px !important;
                object-fit: contain;
                border: 2px ridge #cf8031;
                min-width: 48px;
                background: #31afcf40;
            }
            .btn-primary{
                /*background-color: #cf8031;*/
            }
            .brand-link .brand-image{
                border-radius: 0;
                box-shadow: none !important;
            }
            #editBlogForm img{
                width: 10%;
                margin-left: 26px;
                object-fit: cover;
                box-shadow: 0 0 15px -9px #000;
                border-radius: 2px;
            }
            </style>


{{--        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">--}}
        @stack('styles')
    </head>
    <body class="hold-transition sidebar-mini">
        {{-- @include('sweet::alert') --}}
        <div class="wrapper">
             @include('includes.header-nav')
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="#" class="brand-link">
                    <img src="{{ asset('zubis/img/logo.png') }}" alt="{{ config('app.name') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light"> &nbsp;</span>
                </a>
                @include('includes.side-nav')
            </aside>
            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark"> Dashboard</h1>
                            </div>
                            {{-- @include('pages.includes.breadcrumb') --}}
                        </div>
                    </div>
                </div>
                <div class="content">
                    @yield('content')
                </div>
            </div>
            <aside class="control-sidebar control-sidebar-dark">
                <div class="p-3">
                    <h5>Title</h5>
                    <p>Sidebar content</p>
                </div>
            </aside>
            <footer class="main-footer">
                <div class="float-right d-none d-sm-inline">
                    <span class="date-time"></span>
                </div>
                <strong>Copyright &copy; {{ date('Y') }} <a href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>.</strong> All rights reserved.
            </footer>
        </div>
        <script src="{{ asset('/ad-lte/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('/ad-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/ad-lte/dist/js/adminlte.min.js') }}"></script>
{{--        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>--}}
        <script src="{{ asset('/ad-lte/plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('/ad-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
{{--        <script src="{{ asset('js/common.js') }}"></script>--}}
        {{-- @include('pages.includes.toastr') --}}
        <script src="{{ asset('/ad-lte/dist/js/demo.js') }}"></script>

        <!-- DataTables -->
        <script src="{{ asset('/ad-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/ad-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/ad-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('/ad-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

        <!-- Ekko Lightbox -->
        <script src="{{ asset('/ad-lte/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                var App = {
                    initialize: function() {
                        $('.summer-note').summernote();
                    }
                };
                App.initialize();
            })

            // light box

            $(function () {
            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
            });

            // $('.filter-container').filterizr({gutterPixels: 3});
            // $('.btn[data-filter]').on('click', function() {
            // $('.btn[data-filter]').removeClass('active');
            // $(this).addClass('active');
            // });
        })
        // end light box

        </script>
        @stack('scripts')
    </body>
</html>
