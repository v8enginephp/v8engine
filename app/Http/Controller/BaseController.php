<?php

namespace App\Controller;

use App\Helper\Submitter;
use App\Model\Config;
use Illuminate\Http\Request;

class BaseController
{
    public static string $styles;
    public static bool $isRender = false;

    public function view()
    {
        return template("dashboard")->blank();
    }

    public function config()
    {
        return template("dashboard")->blank(view("config"), ["subtitle" => "تنظیمات"]);
    }

    public function storeConfig(Request $request)
    {
        validate($request->all(), Config::$metaRules);
        Config::handleMeta(Config::get("configController", 1), $request);
        return Submitter::refresh();
    }
}