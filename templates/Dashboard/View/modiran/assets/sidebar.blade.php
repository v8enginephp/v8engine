<div id="sidebar">
    <div class="sidebar-top">
        <div class="user-box">
            <div class="user-details text-center">
                <h2 class="text-white text-center">{{$user->full_name}}</h2>
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
            {!! template("dashboard")->menu()->paint() !!}
        </ul>
    </div>
</div>
<!-- END SIDEBAR -->