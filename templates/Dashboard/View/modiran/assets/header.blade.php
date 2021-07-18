<div id="loader">
    <div class="folding-cube">
        <div class="cube1 cube"></div>
        <div class="cube2 cube"></div>
        <div class="cube4 cube"></div>
        <div class="cube3 cube"></div>
    </div>
</div>

<!-- BEGIN HEADER -->
<div class="navbar navbar-fixed-top" id="main-navbar">
    <div class="header-right">
        <a href="@url" class="logo-con">
            <img src="@prop('logo')" class="img-responsive center-block" style="max-height: 3rem">
        </a>
    </div><!-- /.header-right -->
    <div class="header-left">
        <div class="top-bar">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#" class="btn" id="toggle-sidebar">
                        <span></span>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="#" class="btn" id="toggle-fullscreen">
                        <i class="icon-size-fullscreen"></i>
                    </a>
                </li>
                {{--                <li class="dropdown dropdown-messages" hidden>--}}
                {{--                    <a href="#" class="dropdown-toggle btn" data-toggle="dropdown">--}}
                {{--                        <i class="icon-envelope"></i>--}}
                {{--                        <span class="badge badge-primary">--}}
                {{--                                    4--}}
                {{--                                </span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="dropdown-menu has-scrollbar">--}}
                {{--                        <li class="dropdown-header clearfix">--}}
                {{--                                    <span class="pull-right">--}}
                {{--                                        <a href="#" rel="tooltip" title="خواندن همه" data-placement="left">--}}
                {{--                                            <i class="icon-eye"></i>--}}
                {{--                                        </a>--}}
                {{--                                        شما 4 پیام تازه دارید.--}}
                {{--                                    </span>--}}
                {{--                        </li>--}}
                {{--                        <li class="dropdown-body">--}}
                {{--                            <ul class="dropdown-menu-list">--}}
                {{--                                <li class="clearfix">--}}
                {{--                                    <a href="#">--}}
                {{--                                        <p class="clearfix">--}}
                {{--                                            <strong class="pull-right">--}}
                {{--                                                <img src="@assets/images/user/32.png" class="img-circle"--}}
                {{--                                                     alt="">--}}
                {{--                                                سهراب سپهری--}}
                {{--                                            </strong>--}}
                {{--                                            <small class="pull-left text-muted">--}}
                {{--                                                <i class="icon-clock"></i>--}}
                {{--                                                پانزده دقیقه پیش--}}
                {{--                                            </small>--}}
                {{--                                        </p>--}}
                {{--                                        <p>پیام پرمهرتان دریافت شد!</p>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li class="clearfix">--}}
                {{--                                    <a href="#">--}}
                {{--                                        <p class="clearfix">--}}
                {{--                                            <strong class="pull-right">--}}
                {{--                                                <img src="@assets/images/user/32.png" class="img-circle"--}}
                {{--                                                     alt="">--}}
                {{--                                                شفیعی کدکنی--}}
                {{--                                            </strong>--}}
                {{--                                            <small class="pull-left text-muted">--}}
                {{--                                                <i class="icon-clock"></i>--}}
                {{--                                                سی دقیقه پیش--}}
                {{--                                            </small>--}}
                {{--                                        </p>--}}
                {{--                                        <p>بسته ارسالی شما به دستم رسید.</p>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li class="clearfix">--}}
                {{--                                    <a href="#">--}}
                {{--                                        <p class="clearfix">--}}
                {{--                                            <strong class="pull-right">--}}
                {{--                                                <img src="@assets/images/user/32.png" class="img-circle"--}}
                {{--                                                     alt="">--}}
                {{--                                                قیصر امین پور--}}
                {{--                                            </strong>--}}
                {{--                                            <small class="pull-left text-muted">--}}
                {{--                                                <i class="icon-clock"></i>--}}
                {{--                                                یک ساعت پیش--}}
                {{--                                            </small>--}}
                {{--                                        </p>--}}
                {{--                                        <p>مجموعه آثار بنده را ببینید.</p>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li class="clearfix">--}}
                {{--                                    <a href="#">--}}
                {{--                                        <p class="clearfix">--}}
                {{--                                            <strong class="pull-right">--}}
                {{--                                                <img src="@assets/images/user/32.png" class="img-circle"--}}
                {{--                                                     alt="">--}}
                {{--                                                مهدی اخوان ثالث--}}
                {{--                                            </strong>--}}
                {{--                                            <small class="pull-left text-muted">--}}
                {{--                                                <i class="icon-clock"></i>--}}
                {{--                                                دو ساعت پیش--}}
                {{--                                            </small>--}}
                {{--                                        </p>--}}
                {{--                                        <p>با تشکر...</p>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                            </ul>--}}
                {{--                        </li>--}}
                {{--                        <li class="dropdown-footer clearfix">--}}
                {{--                            <a href="#">--}}
                {{--                                <i class="icon-list fa-flip-horizontal"></i>--}}
                {{--                                مشاهده همه پیام ها--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                {{--                <li class="dropdown dropdown-announces" hidden>--}}
                {{--                    <a href="#" class="dropdown-toggle btn" data-toggle="dropdown">--}}
                {{--                        <i class="icon-bell"></i>--}}
                {{--                        <span class="badge badge-warning">--}}
                {{--                                    5--}}
                {{--                                </span>--}}
                {{--                    </a>--}}
                {{--                    <ul class="dropdown-menu has-scrollbar">--}}
                {{--                        <li class="dropdown-header clearfix">--}}
                {{--                                    <span class="pull-right">--}}
                {{--                                        <a href="#" rel="tooltip" title="خواندن همه" data-placement="left">--}}
                {{--                                            <i class="icon-eye"></i>--}}
                {{--                                        </a>--}}
                {{--                                        <span>--}}
                {{--                                            شما 8 اعلان تازه دارید.--}}
                {{--                                        </span>--}}
                {{--                                    </span>--}}

                {{--                        </li>--}}
                {{--                        <li class="dropdown-body">--}}
                {{--                            <ul class="dropdown-menu-list">--}}
                {{--                                <li class="clearfix">--}}
                {{--                                    <a href="#">--}}
                {{--                                        <p class="clearfix">--}}
                {{--                                            <strong class="pull-right">عباس دوران</strong>--}}
                {{--                                            <small class="pull-left text-muted">--}}
                {{--                                                <i class="icon-clock"></i>--}}
                {{--                                                21:30--}}
                {{--                                            </small>--}}
                {{--                                        </p>--}}
                {{--                                        <p>بسته ارسالی شما به دستم رسید.</p>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li class="clearfix">--}}
                {{--                                    <a href="#">--}}
                {{--                                        <p class="clearfix">--}}
                {{--                                            <strong class="pull-right">حسن باقری</strong>--}}
                {{--                                            <small class="pull-left text-muted">--}}
                {{--                                                <i class="icon-clock"></i>--}}
                {{--                                                20:20--}}
                {{--                                            </small>--}}
                {{--                                        </p>--}}
                {{--                                        <p>از محبت شما ممنونم.</p>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li class="clearfix">--}}
                {{--                                    <a href="#">--}}
                {{--                                        <p class="clearfix">--}}
                {{--                                            <strong class="pull-right">مدیر کل</strong>--}}
                {{--                                            <small class="pull-left text-muted">--}}
                {{--                                                <i class="icon-clock"></i>--}}
                {{--                                                19:20--}}
                {{--                                            </small>--}}
                {{--                                        </p>--}}
                {{--                                        <p>سفارش شما ارسال گردید..</p>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li class="clearfix">--}}
                {{--                                    <a href="#">--}}
                {{--                                        <p class="clearfix">--}}
                {{--                                            <strong class="pull-right">مدیر مالی</strong>--}}
                {{--                                            <small class="pull-left text-muted">--}}
                {{--                                                <i class="icon-clock"></i>--}}
                {{--                                                17:40--}}
                {{--                                            </small>--}}
                {{--                                        </p>--}}
                {{--                                        <p>درخواست فیش حقوقی</p>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                                <li class="clearfix">--}}
                {{--                                    <a href="#">--}}
                {{--                                        <p class="clearfix">--}}
                {{--                                            <strong class="pull-right">ابراهیم همت</strong>--}}
                {{--                                            <small class="pull-left text-muted">--}}
                {{--                                                <i class="icon-clock"></i>--}}
                {{--                                                15:45--}}
                {{--                                            </small>--}}
                {{--                                        </p>--}}
                {{--                                        <p>پیام های مرا دنبال کنید.</p>--}}
                {{--                                    </a>--}}
                {{--                                </li>--}}
                {{--                            </ul>--}}
                {{--                        </li>--}}
                {{--                        <li class="dropdown-footer clearfix">--}}
                {{--                            <a href="#">--}}
                {{--                                <i class="icon-list fa-flip-horizontal"></i>--}}
                {{--                                مشاهده همه اعلانات--}}
                {{--                            </a>--}}
                {{--                        </li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}

                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle dropdown-hover" data-toggle="dropdown">
                        <img src="@assets/images/user/48.png" width="48px" height="48px" alt="عکس پرفایل"
                             class="img-circle img-responsive">
                        <span>{{$user->name}} {{$user->family}}</span>
                        <i class="icon-arrow-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        {{--                        @if(isset($_COOKIE['old_id']))--}}
                        {{--                            <li>--}}
                        {{--                                <a href="{{url('users/login/'.$_COOKIE['old_id'])}}">--}}
                        {{--                                    <i class="icon-user"></i>--}}
                        {{--                                    بازگشت به مدیریت</a>--}}
                        {{--                            </li>--}}
                        {{--                        @endif--}}
                        <li>
                            <a href="{{route('user.profile.index')}}">
                                <i class="icon-user"></i>
                                حساب کاربری
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="@url/user/logout">
                                <i class="icon-power"></i>
                                خروج
                            </a>
                        </li>
                    </ul>
                </li>
            </ul><!-- /.navbar-left -->
        </div><!-- /.top-bar -->
    </div><!-- /.header-left -->
</div><!-- /.navbar -->
<!-- END HEADER -->
