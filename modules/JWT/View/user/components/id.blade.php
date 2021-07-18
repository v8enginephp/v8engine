<div class="col d-flex" onclick="openModal({{$model->id}})" style="cursor: pointer;">
    {{$model->id}}
    @if($model->comments->count() >0)
        <i class="fa fa-comment ml-2 mt-2"></i>
    @else
        <i class="fa fa-comment-o ml-2 mt-2"></i>
    @endif
</div>