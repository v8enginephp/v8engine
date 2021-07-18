<!DOCTYPE html>
<html lang="fa" dir="rtl">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title>@prop("title") | احراز هویت </title>
    @include("assets.styles")
</head>


<body class="active-ripple theme-orange">
<div id="loader">
    <div class="spinner"></div>
</div>
<div class="fixed-modal-bg"></div>
<div class="modal-page shadow border border-info mt-5" style="background-color: white">
    <div class="container-fluid mt-5">
        <div class="row  mt-5">

            <div class="col-md-12 mt-5">
                <p class="text-center m-t-30 m-b-40">
                    <i class="icon-user-following border img-circle font-xxxlg p-20 text-dark"></i>
                </p>
                <h2 class="text-center m-b-20 text-dark ">ورود | ثبت نام</h2>
                <hr>

                <form id="advanced-form" action="#">
                    <div class="form-group">
                        <label class="sr-only control-label" for="email"></label>
                        <div class="input-group round">
                                    <span class="input-group-addon">
                                        <i class="icon-envelope"></i>
                                    </span>
                            <input type="text" class="form-control" dir="ltr" id="phone"
                                   placeholder="09123456789">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-round btn-block" id="login" value="Login">
                            <i class="icon-check"></i>
                            ورود|ثبت نام
                        </button>
                    </div>
                </form>
                <hr class="m-b-30">
            </div>
        </div>
    </div>
</div>
@include("assets.scripts")
<script>

    $("#login").click(function (e) {
        e.preventDefault()
        submiter(["#password", "#email"], "api/user/login", "POST", "", "", ["{{\Core\App::request()->input("redirect")}}", true], ["redirect", "session"])
    })

</script>
</body>

</html>