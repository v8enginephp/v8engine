<?php

use App\Helper\View\Ajax;

/**
 * @var $ajax Ajax
 */
?>
@push("scripts")
    <script>
        $("#{!! $ajax->getFormId() !!}").submit(e => {
            e.preventDefault();
            @unless($ajax->getDone())
            formSubmit("#{!! $ajax->getFormId() !!}")
            @else
            formSubmit("#{!! $ajax->getFormId() !!}",false).done({!! $ajax->getDone() !!})
            @endunless
        })
    </script>
@endpush