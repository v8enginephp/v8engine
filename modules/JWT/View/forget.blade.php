<!DOCTYPE html>
<html lang="fa" dir="rtl">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <title>@prop("title") |  فراموشی رمزعبور </title>
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
                <h2 class="text-center m-b-20 text-dark "> فراموشی رمزعبور</h2>
                <hr>

                <form id="advanced-form" action="{{route("forget")}}" method="post" onsubmit="$('#signup').click();;return false;">

                    <div class="form-group">
                        <div class="input-group round">
                        <span class="input-group-addon">
                        <i class="icon-envelope"></i>
                        </span>
                            <input type="text" class="form-control  ltr text-left" id="email" placeholder="ایمیل" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-info btn-round btn-block" id="signup" value="Sign up">
                            <i class="icon-check"></i>
                            ادامه
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

    $("#signup").click(function (e) {
        e.preventDefault()
        formSubmit("#advanced-form");
    })

</script>
</body>

</html>