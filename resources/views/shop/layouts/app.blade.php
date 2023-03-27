<!DOCTYPE html>
<html lang="{{ setting('language', 'vi') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ __('Website mẫu giới thiệu dịch vụ mecare - LAPO.VN') }}
        @endif
    </title>
    @yield('seo')

    <link rel="icon" href="{{ setting('store_favicon') ? \Storage::url(setting('store_favicon')) : '' }}"
          type="image/gif" sizes="16x16">
    @if(setting('custom_styles'))
        <style>
            {{ setting('custom_styles') }}
        </style>
    @endif
    <!-- Common Css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('common/toastr/toastr.min.css') }}">
    <!-- End Common Css-->
    <link rel="preload" as="style" type="text/css" href="{{ asset('sapo/assets/bootstrap.scss.css') }}" onload="this.rel='stylesheet'"/>
    <link href="{{ asset('sapo/assets/bootstrap.scss.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link rel="preload" as="style" type="text/css" href="{{ asset('sapo/assets/base.scss.css') }}" onload="this.rel='stylesheet'"/>
    <link href="{{ asset('sapo/assets/base.scss.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link rel="preload" as="style" type="text/css" href="{{ asset('sapo/assets/ant-du-lich.scss.css') }}" onload="this.rel='stylesheet'"/>
    <link href="{{ asset('sapo/assets/ant-du-lich.scss.css') }}" rel="stylesheet" type="text/css" media="all"/>
    @stack('styles')

    @stack('scripts_breadcrumb')

</head>
<body>
@include('shop.layouts.header')
@yield('content')
@include('shop.layouts.footer')
<!-- JS here -->
<script src="{{ asset('sapo/assets/jquery-2.2.3.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/one-page-nav-min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.meanmenu.min.js') }}"></script>
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
<script src="{{ asset('frontend/js/paroller.js') }}"></script>
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend/js/js_isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('frontend/js/imagesloaded.min.js') }}"></script>
<script src="{{ asset('frontend/js/parallax.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('frontend/js/parallax-scroll.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/element-in-view.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"
        integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg=="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous"></script>
@stack('scripts')
@if(setting('custom_scripts'))
    <script>
        {{ setting('custom_scripts') }}
    </script>
@endif

<!-- Common Js -->
<script src="{{ asset('common/toastr/toastr.min.js') }}"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "timeOut": "5000",
        iconClasses: {
            error: 'alert-error',
            info: 'alert-info',
            success: 'alert-success',
            warning: 'alert-warning'
        }
    };
</script>
<script src="{{ asset('common/js/ajax-form.js') }}"></script>
<script src="{{ asset('common/js/contact.js') }}"></script>
<script src="{{ asset('common/js/subscribe-email.js') }}"></script>
<!-- End Common Js-->

@include('shop.layouts.partials.notification')
</body>
</html>
