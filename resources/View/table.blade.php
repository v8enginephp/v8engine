<?php
/**
 * @var \Illuminate\Support\Collection $records
 */
?>
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped" id="{{$id}}">
        <thead>
        <tr>
            {!! $header !!}
        </tr>
        </thead>
        <tbody>
            {!!$body !!}
        </tbody>
    </table>
</div>
<!-- /.table-responsive -->