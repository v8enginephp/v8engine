<div class="col-lg-12">
    <div class="portlet box border shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">
                    <i class="icon-shield"></i>
                    فرم ایجاد وظیفه جدید
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
            <div class="col">
                <div class="form-group">
                    <label for="{{\Module\JWT\Model\UserPermission::SCOPE}}">وظایف</label>
                    <abbr title="سطح دسترسی کاربر"><i class="text-danger font-weight-bold><
                    icon-exclamation"></i></abbr>
                    <select class="form-control" id="{{\Module\JWT\Model\UserPermission::SCOPE}}">
                        @foreach($roles as $key => $role)
                            <option value="{{$role}}">{{$role}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="{{\Module\JWT\Model\UserPermission::STATUS}}">وضعیت</label>
                    <abbr title="وضعیت سطح دسترسی"><i class="text-danger font-weight-bold><
                    icon-exclamation"></i></abbr>
                    <select class="form-control" id="{{\Module\JWT\Model\UserPermission::STATUS}}">
                        @foreach(["grant"=>"مجاز","deny"=>"غیرمجاز"] as $key=>$value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-info btn-block rounded" form="new-product"
                            id="store-post">
                        <i class="icon-check"></i>
                        ذخیره
                    </button>
                </div><!-- /.form-group -->
            </div><!-- /.portlet-body -->
        </div><!-- /.portlet -->

    </div><!-- /.col-lg-12 -->
</div>

@push("scripts")
    <script>
        let roles = "";

        $("#store-post").click(function () {
            submiter([
                "#{{\Module\JWT\Model\UserPermission::STATUS}}",
                "#{{\Module\JWT\Model\UserPermission::SCOPE}}",
            ], "role/user", "POST", "", "", ["{{\Core\App::request()->id}}"], ["user_id"]);
        });
    </script>
@endpush