<div id="sidebar">
    <div class="sidebar-top">
        <div class="user-box">
            <div class="user-details text-center">
                <h2 class="text-white text-center">{{$user->full_name}}</h2>
                <p class="text-white"> &nbsp; موجودی کیف پول :‌{{$user->credit}} تومان</p>
                <a href="{{route("wallet")}}" style="background: #0abb87" class="btn rounded btn-floating
                mt-1">
                    <i class="fa fa-plus"></i>
                    افزایش اعتبار کیف پول
                </a>
            </div>
        </div>
    </div>
    <div class="side-menu-container">
        <ul class="metismenu" id="side-menu">
            <li class="open  conditional-bg">
                <a href="@url/dashboard" class="">
                    <i class="icon-home"></i>
                    <span>{{__("base.dashboard","Dashboard")}}</span>
                </a>
            </li>
            {!!template("dashboard")->menu()->paint()!!}
        </ul><!-- /#side-menu -->
    </div><!-- /.side-menu-container -->
</div><!-- /#sidebar -->
<!-- END SIDEBAR -->