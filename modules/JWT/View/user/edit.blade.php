<link href="@assets/plugins/data-table/DataTables-1.10.16/css/jquery.dataTables.css" rel="stylesheet">
<div class="col-lg-12">
    <div class="portlet box border shadow m-t-30">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">
                    <i class="icon-shield"></i>
                    اطلاعات شخصی کاربر {{$edit_user->full_name}}
                </h3>
            </div><!-- /.portlet-title -->
            <div class="buttons-box">

                <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="" href="#"
                   data-original-title="تمام صفحه">
                    <i class="icon-size-fullscreen"></i>
                    <div class="paper-ripple">
                        <div class="paper-ripple__background"></div>
                        <div class="paper-ripple__waves"></div>
                    </div>
                </a>
                <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="" href="#"
                   data-original-title="کوچک کردن">
                    <i class="icon-arrow-up"></i>
                    <div class="paper-ripple">
                        <div class="paper-ripple__background"></div>
                        <div class="paper-ripple__waves"></div>
                    </div>
                </a>
            </div><!-- /.buttons-box -->
        </div><!-- /.portlet-heading -->
        <div class="portlet-body">
            <form id="advancedForm" method="POST" class="form-horizontal" action="/users/{{$edit_user->id}}" onsubmit="return false;" autocomplete="off" novalidate="novalidate">
                @method("put")
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::ROLE_ID}}">سمت</label>
                    <abbr title="سطح دسترسی کاربر"><i class="text-danger font-weight-bold>< icon-exclamation"></i></abbr>
                    <div class="col-12">
                        <select class="form-control" name="{{Module\JWT\Model\User::ROLE_ID}}"
                                id="{{Module\JWT\Model\User::ROLE_ID}}">
                            @foreach($roles as $role)
                                <option
                                        {{ $role->id == $edit_user->role_id ? 'selected' : '' }}
                                        value="{{$role->id}}">{{$role->name}}
                                </option>
                            @endforeach
                        </select>
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::NAME}}">نام</label>
                    <abbr title="نام فرد"><i class="text-danger font-weight-bold>< icon-exclamation"></i></abbr>
                    <div class="col-12">
                        <input type="text" class="form-control" id="{{Module\JWT\Model\User::NAME}}"
                               name="{{Module\JWT\Model\User::NAME}}"
                               value="{{$edit_user->name}}"
                               placeholder="نام"
                               title="نام">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::FAMILY}}">نام خانوادگی</label>
                    <abbr title="نام خانوادگی فرد"><i class="text-danger font-weight-bold>< icon-exclamation"></i></abbr>
                    <div class="col-12">
                        <input type="text" class="form-control" id="{{Module\JWT\Model\User::FAMILY}}"
                               value="{{$edit_user->family}}"
                               name="{{Module\JWT\Model\User::FAMILY}}" placeholder="نام خانوادگی">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::SITE}}">نشانی وب سایت</label>
                    <abbr title="آدرس سایت فرد"><i class="text-danger font-weight-bold>< icon-exclamation"></i></abbr>
                    <div class="col-12">
                        <input type="text" class="form-control" id="{{Module\JWT\Model\User::SITE}}"
                               value="{{$edit_user->site}}"
                               name="{{Module\JWT\Model\User::SITE}}" placeholder="نشانی وب سایت">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::SLUG}}">نامک</label>
                    <abbr title=""><i class="text-danger font-weight-bold>< icon-exclamation"></i></abbr>
                    <div class="col-12">
                        <input type="text" class="form-control" id="{{Module\JWT\Model\User::SLUG}}"
                               value="{{$edit_user->slug}}"
                               name="{{Module\JWT\Model\User::SLUG}}" placeholder="نامک وب سایت">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::PHONE}}">شماره
                        تماس</label>
                    <abbr title="شماره موبایل ۱۱ رقمی"><i class="text-danger font-weight-bold><
                    icon-exclamation"></i></abbr>
                    <div class="col-12">
                        <input type="text" class="form-control only-numbers"
                               id="{{Module\JWT\Model\User::PHONE}}"
                               value="{{$edit_user->phone}}"
                               name="{{Module\JWT\Model\User::PHONE}}" placeholder="مثال:09133333333">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label"
                           for="{{Module\JWT\Model\User::EMAIL}}">رایانامه</label>
                    <abbr title="ایمیل کاربر (جیمیل)"><i class="text-danger font-weight-bold><
                    icon-exclamation"></i></abbr>
                    <div class="col-12">
                        <input type="text" class="form-control" id="{{Module\JWT\Model\User::EMAIL}}"
                               value="{{$edit_user->email}}"
                               name="{{Module\JWT\Model\User::EMAIL}}"
                               placeholder="مثال:info@site.com">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::COUNTRY}}">کشور محل
                        سکونت</label>
                    <abbr title="کشور محل سکونت"><i class="text-danger font-weight-bold><
                    icon-exclamation"></i></abbr>
                    <div class="col-12">
                        <input type="text" class="form-control" id="{{Module\JWT\Model\User::COUNTRY}}"
                               value="{{$edit_user->country}}"
                               name="{{Module\JWT\Model\User::COUNTRY}}" placeholder="کشور محل سکونت">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::CITY}}">شهر محل
                        سکونت</label>
                    <abbr title="شهر محل سکونت"><i class="text-danger font-weight-bold><
                    icon-exclamation"></i></abbr>
                    <div class="col-12">
                        <input type="text" class="form-control" id="{{Module\JWT\Model\User::CITY}}"
                               value="{{$edit_user->city}}"
                               name="{{Module\JWT\Model\User::CITY}}" placeholder="شهر محل سکونت">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label"
                           for="{{Module\JWT\Model\User::ADDRESS}}">نشانی</label>
                    <abbr title="آدرس محل زندگی"><i class="text-danger font-weight-bold><
                    icon-exclamation"></i></abbr>
                    <textarea class="form-control" name="{{Module\JWT\Model\User::ADDRESS}}"
                              id="{{Module\JWT\Model\User::ADDRESS}}" cols="30" rows="10"></textarea>
                </div><!-- /.col-12 -->

                {!! \Module\JWT\Model\User::renderMetaFields(true,$edit_user) !!}

                {{--                <div class="form-group">--}}
{{--                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::PASSWORD}}">رمز--}}
{{--                        عبور</label>--}}
{{--                    <abbr title="گذرواژه"><i class="text-danger font-weight-bold><--}}
{{--                    icon-exclamation"></i></abbr>--}}
{{--                    <div class="col-12">--}}
{{--                        <input type="password" class="form-control" id="{{Module\JWT\Model\User::PASSWORD}}"--}}

{{--                               autocomplete="off" placeholder="رمز عبور">--}}
{{--                    </div><!-- /.col-12 -->--}}
{{--                </div><!-- /.form-group -->--}}

{{--                <div class="form-group">--}}
{{--                    <label class="col-sm-4 control-label" for="confirm_password">تکرار رمز عبور</label>--}}
{{--                    <abbr title="تکرار گذرواژه"><i class="text-danger font-weight-bold><--}}
{{--                    icon-exclamation"></i></abbr>--}}
{{--                    <div class="col-12">--}}
{{--                        <input type="password" class="form-control" id="confirm_password"--}}
{{--                               name="confirm_password"--}}
{{--                               placeholder="تکرار رمز عبور">--}}
{{--                    </div><!-- /.col-12 -->--}}
{{--                </div><!-- /.form-group -->--}}
                <div class="form-group">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-info btn-round btn-block" name="signup"
                                id="update-profile"
                                value="Sign up">
                            <i class="icon-check"></i>
                            ثبت اطلاعات پروفایل
                            <div class="paper-ripple">
                                <div class="paper-ripple__background"></div>
                                <div class="paper-ripple__waves"></div>
                            </div>
                        </button>
                    </div><!-- /.col-md-6 -->
                </div><!-- /.form-group -->
            </form>
        </div><!-- /.portlet-body -->
    </div>
</div><!-- /.col-lg-12 -->

<script src="@assets/plugins/data-table/js/jquery.dataTables.min.js"></script>

<script src="@assets/js/pages/datatable.js"></script>
<script>
    window.addEventListener("load", function () {
        // JS
        tableMain = $('#products').DataTable({
            "pageLength": 25
        });

        $("#update-profile").click(function (e) {
            e.preventDefault()
            {{--submiter(["#phone"], "users/" + {{$edit_user->id}}, "POST", "",--}}
            {{--    ["#name", '#family', '#site', '#slug', "#city", "#country", "#address", "#email", "#confirm_password", "#password", "#role_id"],--}}
            {{--    ["put"], ["_method"]);--}}

            formSubmit("#advancedForm");

        })
        $(document).on('input', '.only-numbers', function (e) {
            this.value = this.value.replace('۰', '0');
            this.value = this.value.replace('۱', '1');
            this.value = this.value.replace('۲', '2');
            this.value = this.value.replace('۳', '3');
            this.value = this.value.replace('۴', '4');
            this.value = this.value.replace('۵', '5');
            this.value = this.value.replace('۶', '6');
            this.value = this.value.replace('۷', '7');
            this.value = this.value.replace('۸', '8');
            this.value = this.value.replace('۹', '9');
            this.value = this.value.replace('٤', '4');
            this.value = this.value.replace('٥', '5');
            this.value = this.value.replace('٦', '6');
            this.value = this.value.replace(/[^0-9۰-۹.]/g, '');
            this.value = this.value.replace(/(\..*)\./g, '$1');

        });
    });
</script>