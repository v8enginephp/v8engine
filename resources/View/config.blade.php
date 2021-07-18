<div class="col-lg-12">
    <div class="portlet box border shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">
                    <i class="icon-shield"></i>
                    تنظیمات
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
        <div class="portlet-body row">
            {!! \App\Model\Config::renderMetaFields(true,null,true) !!}
            <div class="col-md-12">
                <hr>
                <div class="form-group col-md-4 mx-auto">
                    <button class="btn btn-info btn-block btn-round" id="store">
                        <i class="icon-check"></i>
                        ذخیره
                        <div class="paper-ripple">
                            <div class="paper-ripple__background"></div>
                            <div class="paper-ripple__waves"></div>
                        </div>
                    </button>
                </div>

            </div>
        </div><!-- /.portlet-body -->

    </div><!-- /.portlet -->

</div><!-- /.col-lg-12 -->

<script>
    window.addEventListener("load", function () {
        $("#store").click(function (e) {
            e.preventDefault()
            {!! \App\Model\Config::renderSubmitter([],"dashboard/config/store","POST",[],[]) !!}
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
        //
        // fetch('',{}).then(res => res.json()).then(console.log)
    });
</script>