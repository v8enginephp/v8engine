<?php


namespace Template\Dashboard;


use App\Helper\Renderable;

class Menu extends Renderable
{

    public function render($object): ?string
    {
        if ($object["parent"] == "")
            return $this->handle($object);
        return "";
    }

    private function handle($object)
    {
        $children = $this->children($object);

        if ($children->count() == 0)
            return $this->display($object) . $this->closeTags();

        $html = $this->display($object, true);
        $children->each(function ($item) use (&$html) {
            if ($this->can($item))
                $html .= $this->handle($item);
        });
        $html .= $this->closeTags(true);
        return $html;
    }

    private function display($object, $hasChild = false)
    {
        $class = $hasChild ? 'dropdown-toggle' : '';
        $html = ' <li>
                   <a href = "' . url($object["url"]) . '" class="' . $class . '" id="' . $object['slug'] . '">
                      <i class="' . $object["icon"] . '" ></i>
                       <span > ' . $object["name"] . '</span>
                   </a>';
        return $hasChild ? $html . "<ul>" : $html;
    }

    private function closeTags($hasChild = false)
    {
        return $hasChild ? " </ul>
                             </li> " : "</li> ";
    }

    private function children($object)
    {
        return $this->where("parent", $object["slug"]);
    }

    public function prioritySort(): Renderable
    {
        return $this->sortBy("priority");
    }

    public function can($object): bool
    {
        if (!$user = $this->user())
            return false;
        return $user->can($object["permission"]);
    }
}