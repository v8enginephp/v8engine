<!DOCTYPE html>
<html lang="fa" dir="rtl" class="rtl">

<head>
    <title>@prop('title') | {{@$params["subtitle"] ?? "داشبورد"}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="@prop("favicon")">
    @render("styles","dashboard")
</head>
<body class="active-ripple @prop('theme-color') fix-header sidebar-extra">
@include("modiran.assets.header")
<!-- BEGIN WRAPPER -->
<div id="wrapper">
    @include("modiran.assets.sidebar")

    <div id="page-content">
        <div class="row">
            @if(@$params["breadcrumb"])
                <div class="col-md-12">
                    <div class="breadcrumb-box border shadow">
                        <ul class="breadcrumb">
                            <li><a href="#">داشبورد</a></li>
                            <li><a href="#">{{@$params["subtitle"]}}</a></li>
                        </ul>
                        <div class="breadcrumb-left">
                            {{\Hekmatinasser\Verta\Verta::instance(Carbon\Carbon::now())->format(' %d %B، %Y H:i')}}
                            <i class="icon-calendar"></i>
                        </div><!-- /.breadcrumb-left -->
                    </div><!-- /.breadcrumb-box -->
                </div><!-- /.col-md-12 -->
            @endif
            @if(@$params["notices"])
                @render("notices")
            @endif
            @if(@$params["injects"])
                @render("content")
@endif