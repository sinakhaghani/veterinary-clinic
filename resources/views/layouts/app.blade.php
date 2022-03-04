<!DOCTYPE html>
<html class="no-js">
    <head>
        <livewire:styles />
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="/client/img/favicon.png">

        <title>کلینیک</title>

        <!-- Fonts -->
        {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}

        <!-- Styles -->
        {{--<link rel="stylesheet" href="{{ mix('css/app.css') }}">--}}
        <link rel="stylesheet" href="/client/css/bootstrap.min.css">
        <link rel="stylesheet" href="/client/css/magnific-popup.css">
        <link rel="stylesheet" href="/client/css/font-awesome.min.css">
        <link rel="stylesheet" href="/client/css/themify-icons.css">
        <link rel="stylesheet" href="/client/css/nice-select.css">
        <link rel="stylesheet" href="/client/css/flaticon.css">
        <link rel="stylesheet" href="/client/css/gijgo.css">
        <link rel="stylesheet" href="/client/css/animate.css">
        <link rel="stylesheet" href="/client/css/slicknav.css">
        <link rel="stylesheet" href="/client/css/style.css">
        <link rel="stylesheet" href="/client/css/custom-style.css">

    </head>
    <body style="font-family: 'iransens' !important;">
        <livewire:client.layouts.header />
        <livewire:client.layouts.slide-area />

        {{ $slot  }}

        <livewire:client.layouts.footer />
    <livewire:scripts />
    {{--<script src="{{ mix('js/app.js') }}" defer></script>--}}
        <script src="/client/js/bootstrap.min.js"></script>
        <script src="/client/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="/client/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="/client/js/popper.min.js"></script>
        <script src="/client/js/owl.carousel.min.js"></script>
        <script src="/client/js/isotope.pkgd.min.js"></script>
        <script src="/client/js/ajax-form.js"></script>
        <script src="/client/js/waypoints.min.js"></script>
        <script src="/client/js/jquery.counterup.min.js"></script>
        <script src="/client/js/imagesloaded.pkgd.min.js"></script>
        <script src="/client/js/scrollIt.js"></script>
        <script src="/client/js/jquery.scrollUp.min.js"></script>
        <script src="/client/js/wow.min.js"></script>
        <script src="/client/js/nice-select.min.js"></script>
        <script src="/client/js/jquery.slicknav.min.js"></script>
        <script src="/client/js/jquery.magnific-popup.min.js"></script>
        <script src="/client/js/plugins.js"></script>
        <script src="/client/js/gijgo.min.js"></script>

        <!--contact js-->
        <script src="/client/js/contact.js"></script>
        <script src="/client/js/jquery.ajaxchimp.min.js"></script>
        <script src="/client/js/jquery.form.js"></script>
        <script src="/client/js/jquery.validate.min.js"></script>
        <script src="/client/js/mail-script.js"></script>
        <script src="/client/js/main.js"></script>
        <script>
            $('#datepicker').datepicker({
                iconsLibrary: 'fontawesome',
                disableDaysOfWeek: [0, 0],
                //     icons: {
                //      rightIcon: '<span class="fa fa-caret-down"></span>'
                //  }
            });
            $('#datepicker2').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                    rightIcon: '<span class="fa fa-caret-down"></span>'
                }

            });
            var timepicker = $('#timepicker').timepicker({
                format: 'HH.MM'
            });
        </script>
    </body>
</html>
