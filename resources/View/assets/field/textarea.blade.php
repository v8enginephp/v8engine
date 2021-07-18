<?php

use App\Helper\View\Field;

/**
 * @var $field Field
 */
?>

<div class="form-group {!! $field->attribute('grid') ?? "col-md-12" !!}">
    {!! $field->getLabel() !!}
    <textarea {!! $field->renderAttributes() !!}>{!! $field->getValue() !!}</textarea>
</div>