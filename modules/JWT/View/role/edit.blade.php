<div class="col-lg-12">
    <div class="portlet box border shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">
                    <i class="icon-shield"></i>
                    فرم ویرایش وظیفه
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
                    <label for="{{\Module\JWT\Model\Role::TITLE}}">موضوع</label>
                    <abbr title=""><i class="text-danger font-weight-bold>< icon-exclamation"></i></abbr>
                    <input type="text" id="{{\Module\JWT\Model\Role::TITLE}}" class="form-control rounded">
                </div>

                <div class="form-group">
                    <label for="{{\Module\JWT\Model\Role::NAME}}">اسم</label>
                    <abbr title=""><i class="text-danger font-weight-bold>< icon-exclamation"></i></abbr>
                    <input type="text" id="{{\Module\JWT\Model\Role::NAME}}" class="form-control rounded">
                </div>

                <div class="form-group">
                    <label for="{{\Module\JWT\Model\Role::SCOPES}}">وظایف</label>
                    <abbr title=""><i class="text-danger font-weight-bold>< icon-exclamation"></i></abbr>
                    <div class="row">
                        @foreach($roles as $key => $role)
                            <?php
                            /**
                             * @var $role
                             * @var $scope
                             */
                            $attr = ['class' => 'scopes', 'value' => $role];
                            !in_array($role, $scope->getScopes()) ?: $attr["checked"] = 1;
                            ?>
                            {!! (new \App\Helper\View\Filed\Label($role,new \App\Helper\View\Filed\Input($attr,'checkbox'),["grid"=>"col-md-4"]))->setDirection('ltr') !!}
                        @endforeach
                    </div>
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
            $("input[type='checkbox'].scopes:checked").each(function (index, item) {
                roles += $(item).val() + ",";
            });

            submiter([
                "#{{\Module\JWT\Model\Role::NAME}}",
                "#{{\Module\JWT\Model\Role::TITLE}}",
            ], "role/{{$scope->id}}", "POST", "", "", [roles, "put"], ["{{\Module\JWT\Model\Role::SCOPES}}",
                "_method"]);
        });
    </script>
@endpush