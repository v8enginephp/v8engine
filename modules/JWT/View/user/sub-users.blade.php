<link href="@assets/plugins/data-table/DataTables-1.10.16/css/jquery.dataTables.css" rel="stylesheet">
<div class="col-lg-12">
    <div class="portlet box border shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">
                    <i class="icon-frane"></i>
                    لیست زیر مجموعه ها :{{isset($users[0])?$users[0]->full_name:''}}
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
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="products">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نام</th>
                        <th>سمت</th>
                        <th>زیر مجموعه ها</th>
                        <th>موبایل</th>
                        <th>تاریخ ثبت نام</th>
                        <td>کد تایید</td>
                        <td>ادرس</td>
                        <td>وضعیت</td>
                        <td>مانده حساب</td>
                        <td>عملیات</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->full_name}}</td>
                            <td>{{$user->role->name}}</td>
                            <td>
                                <a href="{{url('users/affiliate').'/'.$user->id}}"
                                   class="btn btn-info btn-round open-edit-model ">مشاهده</a>
                            </td>
                            <td>{{$user->phone}}</td>
                            <td>{{Hekmatinasser\Verta\Verta::instance($user->created_at)->format(' %d %B، %Y H:i')}}</td>
                            <td>{{$user->verify_code}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->status}}</td>
                            <td>{{$user->credit}}</td>
                            <td>
                                <a href="{{url('users/edit').'/'.$user->id}}"
                                   class="btn btn-info btn-round open-edit-model ">ویرایش</a>
                                <a data-id="{{$user->id}}"
                                   class="btn btn-info btn-round  login">ورود</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


            <!-- /.table-responsive -->
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->

<script src="@assets/plugins/data-table/js/jquery.dataTables.min.js"></script>

<script src="@assets/js/pages/datatable.js"></script>
<script>
    window.addEventListener("load", function () {
        // JS
        tableMain = $('#products').DataTable({
            "pageLength": 25
        });

        $(".login").click(function (e) {
            console.log(1)
            e.preventDefault()
            href = $(this).attr('data-id');
            submiter([], 'users/login/' + href, "POST")
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