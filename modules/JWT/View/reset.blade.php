<!DOCTYPE html>
<html lang="fa" dir="rtl">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title>@prop("title") |  تغیر گذرواژه </title>
    @include("assets.styles")
</head>


<body class="active-ripple theme-orange">
<div id="loader">
    <div class="spinner"></div>
</div>
<div class="fixed-modal-bg"></div>
<div class="modal-page shadow border border-info mt-5" style="background-color: white">
    <div class="container-fluid">
        <div class="row ">

            <div class="col-md-12">
                <p class="text-center m-t-30 m-b-40">
                    <i class="icon-user-following border img-circle font-xxxlg p-20 text-dark"></i>
                </p>
                <h2 class="text-center m-b-20 text-dark "> تغیر گذرواژه</h2>
                <hr>

                <form id="advanced-form" action="{{route("reset")}}" method="post" onsubmit="$('#reset').click();;return false;">
                    <input type="hidden" name="token" value="{{\Core\App::Request()->input("token")}}">
                    <div class="form-group">
                        <div class="input-group round">
                        <span class="input-group-addon">
                        <i class="fa fa-key"></i>
                        </span>
                            <input type="password" class="form-control  ltr text-left" id="password" placeholder="گذرواژه" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group round">
                        <span class="input-group-addon">
                        <i class="fa fa-key"></i>
                        </span>
                            <input type="password" class="form-control  ltr text-left" id="password_confirmation" placeholder="تایید گذرواژه" name="password_confirmation">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-info btn-round btn-block" id="reset" value="Sign up">
                            <i class="icon-check"></i>
                            تغیر گذرواژه
                            <div class="paper-ripple">
                                <div class="paper-ripple__background"></div>
                                <div class="paper-ripple__waves"></div>
                            </div>
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

    $("#reset").click(function (e) {
        e.preventDefault()
        formSubmit("#advanced-form");
    })

</script>
</body>

</html>