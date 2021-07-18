<?php

use App\Helper\View\Field;

/**
 * @var $field Field
 */
?>
<div class="form-group {{$field->attribute('grid') ?? "col-md-12"}}">
    {!! $field->getLabel() !!}
    <select {!! $field->renderAttributes() !!}>
        @foreach($field->options as $option)
            {!! $option->render($field->getValue(),1) !!}
        @endforeach
    </select>
</div>
