<!DOCTYPE html>
<html lang="fa" dir="rtl">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
@include("assets.styles")
<title>@prop('title') | ورود</title>
<body class="active-ripple theme-blue">
<div class="col-md-12" style="height: 150px;background-color: #006DDD;line-height: 150px">
    <div class="row">
        <div class="col-md-4 text-left" dir="ltr">
            <img src="@prop('logo')" class="" style="max-height: 3rem">
        </div>
    </div>
</div>
<div id="loader">
    <div class="spinner"></div>
</div>
<div class="modal-page shadow bg-white border border-info mt-4" style="width: 500px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <p class="text-center m-t-100 m-b-4">
                    <i class="icon-user-following text-dark img-circle font-xxxlg p-20"></i>
                </p>
                <h2 class="text-center m-b-20 mb-5 text-dark mt-3">
                    ورود | ثبت نام
                </h2>
                {{--                <h2 class="text-center m-b-20 mb-5 text-dark mt-3">--}}
                {{--                    بوکرو، تامین کننده اصلی خدمات شبکه های اجتماعی--}}
                {{--                </h2>--}}
                {{--                <h4 class="text-center m-b-20 mb-5 text-dark">--}}
                {{--                    تمامی خدمات بوکرو فقط از طریق نمایندگان فروش ارائه می شود--}}
                {{--                    <br>--}}
                {{--                    لطفا در صورت نیاز به خدمات از طریق نمایندگان ما اقدام بفرمایید--}}
                {{--                    <br>--}}
                {{--                    <br>--}}
                {{--                    <b>--}}
                {{--                        برای دریافت نمایندگی یا وایت لیبل پنل فروش خدمات شبکه های اجتماعی ثبت نام کنید:--}}
                {{--                    </b>--}}
                {{--                </h4>--}}
                <hr class="mt-5">
                <form id="advanced-form" class="mt-2" action="#">
                    <div class="form-group mb-3">
                        <div class="input-group round">
                           <span class="input-group-addon">
                              <i class="icon-phone"></i>
                           </span>
                            <input type="text" class="form-control round text-center" id="phone" name="phone"
                                   placeholder="09123456789">
                        </div>
                    </div>
                    <div class="form-group mb-3 code" style="display: none">
                        <div class="input-group round">
                           <span class="input-group-addon">
                              <i class="icon-key"></i>
                           </span>
                            <input type="text" class="form-control round" id="code" name="code"
                                   placeholder="کد تایید">
                        </div>
                    </div>
                    <div class="form-group mb-2 col-md-6 mx-auto">
                        <button type="submit" class="btn btn-success btn-round btn-block" id="login" value="login">
                            <i class="icon-check"></i>
                            ورود | ثبت نام
                        </button>
                        <button type="submit" style="display: none"
                                class="btn text-white btn-warning btn-round btn-block"
                                id="verify" value="login">
                            <i class="icon-check"></i>
                            تایید هویت
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 " style="background-color: #006DDD;padding-bottom: 90px">
    <div class="row py-4">
        <div class="col-md-4 mt-4" dir="ltr">
            <h4 class="text-white text-center"> تمامی حقوق سایت مربوط به
                @prop('title')
                می باشد
            </h4>
        </div>
        <div class="col-md-2 mt-4">
        </div>
        <div class="col-md-2 text-right" dir="rtl">
            <h3 class="text-white" style="font-weight: bold">اطلاعات تماس</h3>
            <p class="text-white">
                تماس:
                @prop('support')
                {{--                <br>--}}
                {{--                پشتیبانی تلگرام: <a class="p-0 text-white" href="https://t.me/support_provider" target="_blank">@support_provider</a>--}}
                {{--                <br>--}}
                {{--                کانال اطلاع رسانی تلگرام :--}}
                {{--                <a class="text-white" href="https://t.me/tagrani" target="_blank">@Tagrani</a>--}}
            </p>
        </div>
        {{--        <div class="col-lg-2 col-md-3 col-sm-3 mt-3">--}}
        {{--            <a class="col-md-1 text-white" style="font-weight: bold;clear: both">--}}
        {{--                لینک های مفید--}}
        {{--            </a>--}}
        {{--            <ul>--}}
        {{--                <li>--}}
        {{--                    <a class="col-md-1 text-white" style="ffont-size: 16px" href="https://tagrani.com/dashboard/terms">--}}
        {{--                        قوانین و مقررات--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li>--}}
        {{--                    <a class="col-md-1 text-white" style="font-size: 16px" href="https://tagrani.com/dashboard/privacy">--}}
        {{--                        حریم خصوصی--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li>--}}
        {{--                    <a class="col-md-1 text-white mt-3" style="font-size: 16px"--}}
        {{--                       href="https://tagrani.com/document">Api</a>--}}
        {{--                </li>--}}
        {{--            </ul>--}}
    </div>
</div>
@include("assets.scripts")
<script>
    if (window.innerHeight > 900)
        $(".modal-page").css({"height": window.innerHeight - 400 + "px"})

    $("#login").click(function (e) {
        e.preventDefault()
        submiter(["#phone"], "api/user/auth", "POST", "", "", ["{{\Core\App::request()->input("redirect")}}", "marketer"], ["redirect", "marketer"]).done(function (res) {
            res = JSON.parse(res)
            if (res.status) {
                const loginButton = $("#login"), phoneField = $("#phone"), codeField = $(".code");
                loginButton.hide()
                loginButton.attr("disabled", true)
                loginButton.attr("type", "button")
                phoneField.attr("readonly", true);
                phoneField.attr("disabled", true);
                $("#verify").show(400);
                $("#verify").focus(true);
                codeField.show(400);
                codeField.focus();
            }
        })
    })
    $("#verify").click(function (e) {
        e.preventDefault();
        submiter(["#code", "#phone"], "api/user/verify", "POST")
    });
</script>
</body>
</html>