<!DOCTYPE html>
<html lang="fa" dir="rtl" class="rtl">

<head>
    <title>@prop('title') | {{$subTitle ?? "داشبورد"}}</title>
    @include("assets.styles")
</head>
<body class="active-ripple @prop('theme-color') fix-header sidebar-extra">
@include("assets.header")
<!-- BEGIN WRAPPER -->
<div id="wrapper">
    @include("assets.sidebar")

    <div id="page-content">
        <div class="row">
            @if(!isset($breadcrumb))
                <div class="col-md-12">
                    <div class="breadcrumb-box border shadow">
                        <ul class="breadcrumb">
                            <li><a href="#">داشبورد</a></li>
                            <li><a href="#">{{$subTitle}}</a></li>
                        </ul>
                        <div class="breadcrumb-left">
                            {{\Hekmatinasser\Verta\Verta::instance(Carbon\Carbon::now())->format(' %d %B، %Y H:i')}}
                            <i class="icon-calendar"></i>
                        </div><!-- /.breadcrumb-left -->
                    </div><!-- /.breadcrumb-box -->
                </div><!-- /.col-md-12 -->
            @endif
            @render("notices")
            @render("content")