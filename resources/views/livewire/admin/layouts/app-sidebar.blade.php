<div data-active-color="white" data-background-color="aqua-marine" data-image="/admin/img/sidebar-bg/07.jpg" class="app-sidebar">
    <div class="sidebar-header">
        <div class="logo clearfix"><a href="index-2.html" class="logo-text float-right">
                <div class="logo-img"></div><span class="text align-middle">ADMIN</span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"></a></div>
    </div>

    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                <li class=" nav-item"><a href="index.html"><i class="icon-home"></i><span data-i18n="" class="menu-title">داشبورد</span></a>
                </li>
                <li class="has-sub nav-item"><a href="#"><i class="fa fa-users" aria-hidden="true"></i>
                        <span data-i18n="" class="menu-title">دام</span></a>
                    <ul class="menu-content">
                        <li>
                            <i class="fa fa-long-arrow-left"></i>
                            <a href="{{ route('admin.register.livestock') }}"  class="menu-item">ثبت نام دامدار</a>
                        </li>
                        <li>
                            <i class="fa fa-long-arrow-left"></i>
                            <a href="{{ route('admin.register.certificate') }}" class="menu-item">ثبت شناسنامه</a>
                        </li>
                        <li>
                            <i class="fa fa-long-arrow-left"></i>
                            <a href="{{ route('admin.register.type.livestock') }}" class="menu-item">ثبت نوع دام</a>
                        </li>

                    </ul>
                </li>

                <li class="has-sub nav-item"><a href="#"><i class="fa fa-newspaper-o"></i><span data-i18n="" class="menu-title">دارو</span></a>
                    <ul class="menu-content">
                        <li><i class="fa fa-long-arrow-left"></i><a href="view-user.html"  class="menu-item">ثبت نسخه</a>
                        </li>
                        <li><i class="fa fa-long-arrow-left"></i><a href="{{ route('admin.register.medicines') }}" class="menu-item">ثبت دارو</a>
                        </li>
                    </ul>
                </li>

                <li class="has-sub nav-item"><a href="#"><i class="fa fa-cogs"></i><span data-i18n="" class="menu-title">تنظیمات</span></a>
                    <ul class="menu-content">
                        <li><i class="fa fa-long-arrow-left"></i><a href="poster-Category.html"  class="menu-item">افزودن مدیر</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.panel.sms')}}"><i class="fa fa-envelope-o"></i><span data-i18n="" class="menu-title">پنل پیامک</span></a>
                </li>
                <li class="nav-item">
                    <a href="ticket.html"><i class="fa fa-envelope-o"></i><span data-i18n="" class="menu-title">تیکت ها</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
