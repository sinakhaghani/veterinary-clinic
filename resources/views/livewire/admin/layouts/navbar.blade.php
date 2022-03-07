<nav class="navbar navbar-expand-lg navbar-light bg-faded">
    {{--<form wire:submit.prevent="logout">--}}
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-right">
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a class="open-navbar-container"><i class="ft-more-vertical"></i></a></span>

            </div>
            <div class="navbar-container">
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav">

                        <p class="d-none">نوار اطلاع رسانی</p></a></li>
                        <li class="dropdown nav-item mr-0"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-user-link dropdown-toggle"><span class="avatar avatar-online"><img id="navbar-avatar" src="/client/img/login.png" alt="avatar"/></span>
                                <p class="d-none">تنظیمات کاربر</p></a>
                            <form>
                                <div aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-left">
                                    <div class="arrow_box_right"><a href="user-profile-page.html" class="dropdown-item py-1"><i class="ft-edit ml-2"></i><span>پروفایل من</span></a>
                                        <div class="dropdown-divider"></div><a href="#" class="dropdown-item" wire:click="logout"><i class="ft-power ml-2"></i><span>خروج</span></a>
                                    </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    {{--</form>--}}
</nav>
