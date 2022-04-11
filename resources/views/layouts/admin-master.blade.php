<!DOCTYPE html>
<html lang="en" class="loading">

<!-- Mirrored from pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/demo-2/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Sep 2018 15:00:28 GMT -->
<head>
    <livewire:styles />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Convex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Convex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>پنل ادمین </title>
    <link rel="shortcut icon" type="image/x-icon" href="https://pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/app-assets/img/ico/favicon.ico">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/admin/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="/admin/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/vendors/css/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/app.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/PersianDatePicker/persian-datepicker-main.min.css"/>
    <link rel="stylesheet"  href="/admin/js/docsupport/prism.css">
    <link rel="stylesheet"  href="/admin/js/docsupport/chosen.css">
</head>
<body data-col="2-columns" class=" 2-columns ">

<div class="wrapper">
        <livewire:admin.layouts.app-sidebar />
        <livewire:admin.layouts.navbar />
    <div class="main-panel">

        {{ $slot  }}

        <livewire:admin.layouts.footer />
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<livewire:scripts />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/admin/js/PersianDatePicker/persian-date-main.min.js"></script>
<script src="/admin/js/PersianDatePicker/persian-datepicker-main.min.js"></script>
{{--<script src="/admin/vendors/js/core/jquery-3.3.1.min.js"></script>--}}
<script src="/admin/vendors/js/core/popper.min.js"></script>
<script src="/admin/vendors/js/core/bootstrap.min.js"></script>
<script src="/admin/vendors/js/perfect-scrollbar.jquery.min.js"></script>
<script src="/admin/vendors/js/prism.min.js"></script>
<script src="/admin/vendors/js/jquery.matchHeight-min.js"></script>
<script src="/admin/vendors/js/screenfull.min.js"></script>
<script src="/admin/vendors/js/pace/pace.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
{{--<script src="/admin/vendors/js/chartist.min.js"></script>--}}
<!-- END PAGE VENDOR JS-->
<!-- BEGIN CONVEX JS-->
<script src="/admin/js/app-sidebar.js"></script>
<script src="/admin/js/notification-sidebar.js"></script>
<script src="/admin/js/customizer.js"></script>
<!-- END CONVEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
{{--<script src="/admin/js/dashboard-ecommerce.js"></script>--}}
<!-- END PAGE LEVEL JS-->
{{--<script src="/admin/js/docsupport/jquery-3.2.1.min.js" type="text/javascript"></script>--}}
{{--<script src="/admin/js/docsupport/chosen.jquery.js" type="text/javascript"></script>
<script src="/admin/js/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="/admin/js/docsupport/init.js" type="text/javascript" charset="utf-8"></script>--}}

{{--<script>
    $(".select").chosen({max_selected_options: 5});
</script>--}}
<script>

    $(document).ready(function () {
        String.prototype.toEnglishDigit = function() {
            let find = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            let replace = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
            let replaceString = this;
            let regex;
            for (let i = 0; i < find.length; i++) {
                regex = new RegExp(find[i], "g");
                replaceString = replaceString.replace(regex, replace[i]);
            } return replaceString;
        };
        String.prototype.changeFormatDate = function() {
            let newArray = [];
            let array = this.split("/");
            array.forEach(function (item,index){
                if (item.length == 1){
                    return newArray[index] = '0'+item;
                }
                else {
                    return newArray[index] = item;
                }
            });
            return newArray.join("/");
        };
        let today = new Date().toLocaleDateString('fa-IR').toEnglishDigit().changeFormatDate();
        $('.persianDatePicker').val(today);



       /* $(".persianDatePicker").persianDatepicker({
            autoClose: true,
            initialValueType: 'gregorian',
            persianDigit: true,
            initialValue: true,
            observer: true,
            calendarType: 'persian',
            calendar:{
                persian: {
                    locale:'en'
                },
                gregorian:{
                    locale:'en'
                }
            },
            format: 'YYYY/MM/DD',

            onSelect: function(unix){
                String.prototype.toEnglishDigit = function() {
                    let find = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                    let replace = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                    let replaceString = this;
                    let regex;
                    for (let i = 0; i < find.length; i++) {
                        regex = new RegExp(find[i], "g");
                        replaceString = replaceString.replace(regex, replace[i]);
                    } return replaceString;
                };
                String.prototype.changeFormatDate = function() {
                    let newArray = [];
                    let array = this.split("/");
                    array.forEach(function (item,index){
                        if (item.length == 1){
                            return newArray[index] = '0'+item;
                        }
                        else {
                            return newArray[index] = item;
                        }
                    });
                    return newArray.join("/");
                };
                let today = new Date(unix).toLocaleDateString('fa-IR').toEnglishDigit().changeFormatDate();
                $('.persianDatePicker').val(today);

                console.log($('.persianDatePicker').val())
            },
        });*/
    });

</script>

</body>

<!-- Mirrored from pixinvent.com/demo/convex-bootstrap-admin-dashboard-template/demo-2/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Sep 2018 15:01:20 GMT -->
</html>
