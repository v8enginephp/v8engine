<?php


namespace Template\Dashboard;


use App\Helper\Renderable;
use App\Helper\Template;
use App\Helper\View\Script;
use Core\View;
use App\Helper\View\Menu as BaseMenu;

require_once __DIR__ . "/vendor/autoload.php";

class Dashboard extends Template
{
    const VIEW_PATH = __DIR__ . "/View";
    public array $styles = [];
    public array $scripts = [];

    public function __construct()
    {
        View::instance()->addPath(self::VIEW_PATH);
        $this->setStyles();
        $this->scripts();
        $this->assets();
        parent::__construct();
    }

    private function scripts()
    {
        $this->scripts = array_merge(
            [
                "jquery" => asset("assets/plugins/jquery/dist/jquery-1.12.4.min.js"),
                "jquery-migrate" => asset("assets/plugins/jquery-migrate/jquery-migrate-1.2.1.min.js"),
                "popper" => asset("assets/plugins/popper/popper.min.js"),
                "bootstrap" => asset("assets/plugins/bootstrap/dist/js/bootstrap.min.js"),
                "metisMenu" => asset("assets/plugins/metisMenu/dist/metisMenu.min.js"),
                "dropdown" => asset("assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"),
                "PaperRipple" => asset("assets/plugins/paper-ripple/dist/PaperRipple.min.js"),
                "mCustomScrollbar" => asset("assets/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"),
                "sweetalert2" => asset("assets/plugins/sweetalert2/dist/sweetalert2.min.js"),
                "screenfull" => asset("assets/plugins/screenfull/dist/screenfull.min.js"),
                "icheck" => asset("assets/plugins/iCheck/icheck.min.js"),
                "switchery" => asset("assets/plugins/switchery/dist/switchery.js"),
                "core" => asset("assets/js/core.js"),
                "select22" => asset("assets/plugins/select2/dist/js/select2.full.min.js"),
                "i18n" => asset("assets/plugins/select2/dist/js/i18n/fa.js"),
                "select2" => asset("assets/js/pages/select2.js"),
                "incremental" => asset("assets/plugins/jquery-incremental-counter/jquery.incremental-counter.min.js"),
                "ammap" => asset("assets/plugins/ammap3/ammap/ammap.js"),
                "iranHighFa" => asset("assets/plugins/ammap3/ammap/maps/js/iranHighFa.js"),
                "morris" => asset("assets/plugins/morris.js/morris.min.js"),
                "Chart" => asset("assets/plugins/chart.js/dist/Chart.min.js"),
                "dashboard2" => asset("assets/js/pages/dashboard2.js"),
                "toastr" => asset("assets/js/toastr.js"),
                "submit" => asset("assets/js/submit.js"),
                "jquery.dataTables" => asset("assets/plugins/data-table/js/jquery.dataTables.min.js"),
                "datatable" => asset("assets/js/pages/datatable.js"),
            ], $this->scripts
        );

    }

    private function setStyles()
    {
        $this->styles = array_merge([
            "bootstrap" => asset("assets/plugins/bootstrap/dist/css/bootstrap.min.css"),
            "bootstrap.rtl" => asset("assets/plugins/bootstrap-rtl/dist/css/bootstrap-rtl.min.css"),
            "metis-menu" => asset("assets/plugins/metisMenu/dist/metisMenu.min.css"),
            "simple-line" => asset("assets/plugins/simple-line-icons/css/simple-line-icons.min.css"),
            "font-awesome" => asset("assets/plugins/font-awesome/css/font-awesome.min.css"),
            "jquery-scroll" => asset("assets/plugins/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css"),
            "switchery" => asset("assets/plugins/switchery/dist/switchery.min.css"),
            "swal" => asset("assets/plugins/sweetalert2/dist/sweetalert2.min.css"),
            "paper-ripple" => asset("assets/plugins/paper-ripple/dist/paper-ripple.min.css"),
            "_all" => asset("assets/plugins/iCheck/skins/square/_all.css"),
            "dashboard.styles" => asset("assets/css/style.css?id=1"),
            "dashboard.colors" => asset("assets/css/colors.css"),
            "toastr" => asset("assets/css/toastr.css"),
            "select2" => asset("assets/plugins/select2/dist/css/select2.min.css"),
            "jquery.datatables" => asset("assets/plugins/data-table/DataTables-1.10.16/css/jquery.dataTables.css"),
        ], $this->styles);
    }


    private function setParam(&$params, $key, $value, $override = false)
    {
        if (!$override)
            return isset($params[$key]) ?: $params[$key] = $value;
        return $params[$key] = $value;
    }

    private function setDefaultParams(&$params)
    {
        $this->setParam($params, "breadcrumb", true);
        $this->setParam($params, "notices", true);
        $this->setParam($params, "injects", true);
    }

    public function blank($content = "", $params = [])
    {
        $this->setDefaultParams($params);
        return parent::blank($content, $params);
    }

    public function header($params = [])
    {
        return view("modiran.header", compact("params"));
    }

    public function footer($params = [])
    {
        return view("modiran.footer", compact("params"));
    }

    public function menu(?array $items = null): Renderable
    {
        return new Menu($items ?? BaseMenu::getMenu());
    }

    public static function getTemplateTitle()
    {
        return "dashboard";
    }
}