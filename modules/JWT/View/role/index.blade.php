<div class="col-lg-12">
    <div class="portlet box border shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">
                    <i class="icon-frane"></i>
                    وظایف ثبت شده
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
            <a href="{{route("role.create")}}" class="btn btn-primary rounded">ساخت وظیفه جدید</a>
            <hr>
            {!! \Module\JWT\Model\Role::renderTable($role) !!}
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->

@push("scripts")
    <script>
        $(document).ready(function (){
            Module_JWT_Model_Role.order([0,"desc"]).draw();
        })
    </script>
@endpush