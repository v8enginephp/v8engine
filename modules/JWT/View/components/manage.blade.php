<div class="manage dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle rounded" data-toggle="dropdown">مدیریت</button>

    <div class="dropdown-menu">
        <a href="{{url().'/users/edit/'.$model->id}}" class="dropdown-item btn btn-info open-edit-model rounded">ویرایش</a>
        <a data-id="{{$model->id}}" class="dropdown-item btn btn-warning rounded login">ورود</a>
        <a href="{{route("role.user.show",$model->id)}}" class="dropdown-item btn btn-danger rounded">مجوز ها</a>
    </div>
</div>