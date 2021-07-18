</div><!-- /.row -->
</div><!-- /#page-content -->
<!-- END PAGE CONTENT -->

</div><!-- /#wrapper -->
<!-- END WRAPPER -->

<div class="row footer-container">
    <div class="col-md-12">
        <div class="copyright">
            <p class="pull-right">
                کلی حقوق این مجموعه متعلق
                به
                {{\Core\View::getProp("title")}}
                می‌باشد و هرگونه کپی
                برداری از آن پیگرد قانونی دارد
            </p>
            <p class="pull-left ltr tahoma">
                <span>©</span>
                <a href="#">V8 Engine</a>
                <label style="animation:rotateAnimation 1s cubic-bezier(0,.59,.94,.28) 0s infinite alternate">-</label>
                <label>1.0.0</label>
            </p>
        </div>
    </div>
</div>

{{--<!-- BEGIN SETTING -->--}}
{{--<div class="settings d-none d-sm-block">--}}
{{--    <a href="#" class="btn" id="toggle-setting">--}}
{{--        <i class="icon-settings"></i>--}}
{{--    </a>--}}
{{--    <h3 class="text-center">تنظیمات</h3>--}}
{{--    <div class="theme-colors">--}}
{{--        <p class="h6">رنگ قالب : </p>--}}
{{--        <a class="btn btn-round btn-blue ripple-effect active" data-color="blue"></a>--}}
{{--        <a class="btn btn-round btn-red ripple-effect" data-color="red"></a>--}}
{{--        <a class="btn btn-round btn-green ripple-effect" data-color="green"></a>--}}
{{--        <a class="btn btn-round btn-orange ripple-effect" data-color="orange"></a>--}}
{{--        <a class="btn btn-round btn-darkblue ripple-effect" data-color="darkblue"></a>--}}
{{--        <a class="btn btn-round btn-purple ripple-effect" data-color="purple"></a>--}}
{{--    </div><!-- /.theme-colors -->--}}
{{--</div><!-- /.settings -->--}}
{{--<!-- END SETTING -->--}}


<!-- BEGIN JS -->
<script>
    var url = "/";
</script>
@render("scripts","dashboard")

@render("footer")

@stack('scripts')
<script>
    $("#page-content").css("min-height", $(window).height() - 100)
    @if(!$user->can("admin"))
    $(".user-readonly").attr("readonly", true).attr("disabled", true);
    $(".user-hidden").hide();
    @endif
    console.log({!!  json_encode(\Illuminate\Database\Capsule\Manager::getQueryLog())!!})
</script>

</body>
</html>