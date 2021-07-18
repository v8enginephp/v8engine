<div class="col-md-12">
    <div class='alert alert-{{$object["color"]}} {{implode(" ",$object['css'])}}' role='alert'>
        @if($object["closable"])
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        @endif
        @if($object["icon"])
            <i class='{{$object["icon"]}}'></i>
        @endif
        {!!$object["content"] !!}
    </div>
</div>
