<?php

use App\Helper\View\Field;

/**
 * @var $field Field
 */
?>

<div class="form-group relative {{$field->attribute("grid") ?? "col-md-12"}}">
    <input type="file" class="form-control" id="{{$field->getId()}}" name="{{$field->getId()}}">
    {!! $field->getLabel() !!}
    <div class="input-group round ">
        {!! (new \App\Helper\View\Filed\Input($field->getAttributes('id','name')))->setFormGroup(false) !!}
        <span class="input-group-btn input-group-sm">
                                                    <button type="button" class="btn btn-info">
                                                        <i class="icon-picture"></i>
                                                        آپلود
                                                    <div class="paper-ripple"><div
                                                                class="paper-ripple__background"></div><div
                                                                class="paper-ripple__waves"></div></div>
                                                    </button>
                                                </span>
    </div>
    <div class="help-block"></div>
</div>
