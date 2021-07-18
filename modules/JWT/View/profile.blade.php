<div class="col-lg-12">
    <div class="portlet box border shadow m-t-30">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">
                    <i class="icon-shield"></i>
                    اطلاعات شخصی
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
            <form id="advanced-form" method="post" class="form-horizontal" action="#" autocomplete="off" novalidate="novalidate">
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::NAME}}">نام</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="{{Module\JWT\Model\User::NAME}}"
                               name="{{Module\JWT\Model\User::NAME}}"
                               value="{{$user->name}}"
                               placeholder="نام"
                               title="نام">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::FAMILY}}">نام
                        خانوادگی</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="{{Module\JWT\Model\User::FAMILY}}"
                               value="{{$user->family}}"
                               name="{{Module\JWT\Model\User::FAMILY}}" placeholder="نام خانوادگی">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::SITE}}">نشانی وبسایت
                    </label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="{{Module\JWT\Model\User::SITE}}"
                               value="{{$user->site}}"
                               name="{{Module\JWT\Model\User::SITE}}" placeholder="مثال google.com">
                        <p data-toggle="collapse" data-target="#demo" class="text-primary px-3">اتصال دامنه</p>
                        <div id="demo" class="collapse" dir="ltr">
                            <ul class="list-group">
                                <li>DNS 1 : <strong>dns</strong></li>
                                <li>DNS 2 : <strong>dns</strong></li>
                            </ul>
                        </div>
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::PHONE}}">شماره
                        تماس</label>
                    <div class="col-12">
                        <input type="text" class="form-control only-numbers" readonly disabled
                               id="{{Module\JWT\Model\User::PHONE}}"
                               value="{{$user->phone}}"
                               name="{{Module\JWT\Model\User::PHONE}}" placeholder="مثال:09133333333">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label"
                           for="{{Module\JWT\Model\User::EMAIL}}">رایانامه</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="{{Module\JWT\Model\User::EMAIL}}"
                               value="{{$user->email}}"
                               name="{{Module\JWT\Model\User::EMAIL}}"
                               placeholder="مثال:info@site.com">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::COUNTRY}}">کشور محل
                        سکونت</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="{{Module\JWT\Model\User::COUNTRY}}"
                               value="{{$user->country}}"
                               name="{{Module\JWT\Model\User::COUNTRY}}" placeholder="کشور محل سکونت">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::CITY}}">شهر محل
                        سکونت</label>
                    <div class="col-12">
                        <input type="text" class="form-control" id="{{Module\JWT\Model\User::CITY}}"
                               value="{{$user->city}}"
                               name="{{Module\JWT\Model\User::CITY}}" placeholder="شهر محل سکونت">
                    </div><!-- /.col-12 -->
                </div><!-- /.form-group -->
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::ADDRESS}}">نشانی</label>
                    <div class="col-12">
                        <textarea class="form-control" name="{{Module\JWT\Model\User::ADDRESS}}"
                                  id="{{Module\JWT\Model\User::ADDRESS}}" cols="30" rows="10"></textarea>
                    </div>
                </div><!-- /.col-12 -->
                {!! \Module\JWT\Model\User::renderMetaFields(true,$user) !!}
                {{--                <div class="form-group">--}}
                {{--                    <label class="col-sm-4 control-label" for="{{Module\JWT\Model\User::PASSWORD}}">رمز عبور</label>--}}
                {{--                    <div class="col-12">--}}
                {{--                        <input type="password" class="form-control" id="{{Module\JWT\Model\User::PASSWORD}}"--}}

                {{--                               autocomplete="off" placeholder="رمز عبور">--}}
                {{--                    </div><!-- /.col-12 -->--}}
                {{--                </div><!-- /.form-group -->--}}
                {{--                <div class="form-group">--}}
                {{--                    <label class="col-sm-4 control-label" for="confirm_password">تکرار رمز عبور</label>--}}
                {{--                    <div class="col-12">--}}
                {{--                        <input type="password" class="form-control" id="confirm_password" name="confirm_password"--}}
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

@push('scripts')
    <script>
        // JS
        tableMain = $('#products').DataTable({
            "pageLength": 25
        });

        $("#update-profile").click(function (e) {
            e.preventDefault()
            {{--            {!! \Module\JWT\Model\User::renderSubmitter(["#phone"],"user/profile","POST",[], ["#name", '#family', '#site', "#city", "#country", "#address", "#email"]) !!}--}}
            formSubmit("#advanced-form");
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
    </script>
@endpush