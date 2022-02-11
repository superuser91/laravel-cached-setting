<!DOCTYPE html>
<html lang="{{ config('app.locale', 'vi') }}">
<!--begin::Head-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'VGP Beauty Admin') }}</title>
    <meta name="description" content="Service" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="{{ url('/') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('vendor/keenthemes/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}"
        rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('vendor/keenthemes/assets/plugins/global/plugins.bundle.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('vendor/keenthemes/assets/plugins/custom/prismjs/prismjs.bundle.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('vendor/keenthemes/assets/css/style.bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('vendor/keenthemes/assets/css/themes/layout/header/base/light.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('vendor/keenthemes/assets/css/themes/layout/header/menu/light.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href={{ asset('vendor/keenthemes/assets/css/themes/layout/brand/light.min.css') }} rel="stylesheet"
        type="text/css" />
    <link href={{ asset('vendor/keenthemes/assets/css/themes/layout/aside/light.min.css') }} rel="stylesheet"
        type="text/css" />
    <!--end::Layout Themes-->
    @yield('styles')
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <div class="content-fluid d-flex flex-column flex-column-fluid pb-5" id="kt_content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <i class="fas fa-arrow-up"></i>
    </div>
    <!--end::Scrolltop-->
    <script>
        var HOST_URL = "{{ url('/') }}";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->
    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('vendor/keenthemes/assets/plugins/global/plugins.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/keenthemes/assets/plugins/custom/prismjs/prismjs.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/keenthemes/assets/js/scripts.bundle.min.js') }}"></script>
    <!--end::Global Theme Bundle-->
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('vendor/keenthemes/assets/plugins/custom/fullcalendar/fullcalendar.bundle.min.js') }}">
    </script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('vendor/keenthemes/assets/js/pages/widgets.min.js') }}"></script>
    @include('ckfinder::setup')
    @stack('scripts')
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>
