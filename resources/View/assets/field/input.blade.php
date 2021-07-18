<?php

use App\Helper\View\Field;

/**
 * @var $field Field
 */
?>

@if($field->isFormGroup())
    <div class="form-group {!! $field->attribute('grid')  ?? "col-md-12"!!}">
        <input {!! $field->renderAttributes() !!}>
    </div>
@else
    <input {!! $field->renderAttributes() !!}>
@endif
