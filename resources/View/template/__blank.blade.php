<?php

use App\Interfaces\Templatable;

/**
 * @var $template Templatable
 * @var $params array
 * @var $content string
 */
?>
{{--Template Header--}}
{!!template($template::getTemplateTitle())->header($params) !!}

{{--Page Content--}}
{!!$content !!}

{{--Template Footer--}}
{!!template($template::getTemplateTitle())->footer($params) !!}
