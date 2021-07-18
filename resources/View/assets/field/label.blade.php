<?php

use Module\Support\Model\Label;

/**
 * @var $field Label
 */
?>
<div dir="{!! $field->direction !!}" class="{!! $field->attribute('grid') ?? 'col-md-12' !!}">
    <label {!! $field->renderAttributes() !!}>
        {!! $field->text !!}
    </label>
    {!! $field->getInput() !!}
</div>