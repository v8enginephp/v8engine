<?php

use App\Helper\View\Form;

/**
 * @var $form Form
 */
?>
<div class="row col-md-12">
    <form {!! $form->renderAttributes() !!}>

        {!! $form->renderFields() !!}
    </form>
</div>

{!! $form->ajax() !!}
